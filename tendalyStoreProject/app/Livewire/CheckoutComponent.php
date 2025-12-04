<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads; // Importante para la imagen
use App\Models\Carrito;
use App\Models\Negocio;
use App\Models\Orden;
use App\Models\OrdenItem;
use App\Models\Direccion;
use Illuminate\Support\Facades\DB;

class CheckoutComponent extends Component
{   
    use WithFileUploads;

    public $negocio;
    public $itemsCheckout;
    
    // Totales
    public $subtotal = 0;
    public $costo_envio = 0;
    public $total = 0;

    // Lógica de Direcciones
    public $tipo_entrega = 'delivery'; 
    public $usar_direccion_guardada = true; 
    public $direccion_seleccionada_id = null; 

    // Formulario (Inputs)
    public $nombre;
    public $telefono;
    public $direccion;
    public $referencia;
    public $guardar_direccion = false; 
    public $es_principal = false;

    public $comprobante;

    public function mount(Negocio $negocio)
    {
        $this->negocio = $negocio;

        $carrito = Carrito::with('items.producto')->where('user_id', auth()->id())->first();

        if(!$carrito){
            return redirect()->route('carrito.index');
        }

        $this->itemsCheckout = $carrito->items->filter(function ($item) use ($negocio) {
            return $item->producto->negocio_id == $negocio->id;
        });

        if($this->itemsCheckout->isEmpty()){
            return redirect()->route('carrito.index');
        }

        $this->subtotal = $this->itemsCheckout->sum('subtotal');

        if (!$this->negocio->tiene_delivery) {
            $this->tipo_entrega = 'recojo';
            $this->costo_envio = 0;
        } else {
            $this->tipo_entrega = 'delivery';
            
            $tieneDirecciones = Direccion::where('user_id', auth()->id())->exists();

            if ($tieneDirecciones) {
                $this->usar_direccion_guardada = true;
                
                $principal = Direccion::where('user_id', auth()->id())->where('es_principal', true)->first();
                if ($principal) {
                    $this->direccion_seleccionada_id = $principal->id;
                }
                
                $this->costo_envio = $this->negocio->costo_envio;
            } else {
                // Si NO tiene direcciones, mostramos el formulario obligatoriamente
                $this->usar_direccion_guardada = false;
                $this->costo_envio = $this->negocio->costo_envio; 
            }
        }

        $this->calcularTotal();
    }

    public function updatedTipoEntrega($value)
    {
        if ($value == 'recojo') {
            $this->costo_envio = 0;
        } else {
            $this->costo_envio = $this->negocio->costo_envio; 
        }
        $this->calcularTotal();
    }

    public function updatedDireccionSeleccionadaId()
    {
        $this->calcularTotal();
    }

    public function calcularTotal()
    {
        $this->total = $this->subtotal + $this->costo_envio;
    }

    public function procesarCompra()
    {
        $reglas = [
            'comprobante' => 'required|image|max:5120',
        ];

        // Validar dirección solo si es Delivery
        if ($this->tipo_entrega == 'delivery' && $this->negocio->envio_disponible) {
            
            // Si el usuario eligió "Usar guardadas" Y tiene direcciones en BD
            if ($this->usar_direccion_guardada && Direccion::where('user_id', auth()->id())->exists()) {
                $reglas['direccion_seleccionada_id'] = 'required|exists:direcciones,id';
            } else {
                $reglas['nombre'] = 'required|min:2';
                $reglas['telefono'] = 'required|min:9';
                $reglas['direccion'] = 'required|min:5';
            }
        }

        $this->validate($reglas);

        $orden = DB::transaction(function () {
            
            $textoDireccion = '';
            $textoReferencia = '';

            if ($this->tipo_entrega == 'recojo') {
                $textoDireccion = 'RECOJO EN TIENDA';
            } else {
                if ($this->usar_direccion_guardada && $this->direccion_seleccionada_id) {
                    $dir = Direccion::find($this->direccion_seleccionada_id);
                    $textoDireccion = $dir->direccion;
                    $textoReferencia = $dir->referencia;
                    $textoTelefono = $dir->telefono;
                } else {
                    $textoDireccion = $this->direccion;
                    $textoReferencia = $this->referencia . ' (Tel: ' . $this->telefono . ')';
                    $textoTelefono = $this->telefono;

                    // Guardar nueva dirección si se solicitó
                    if ($this->guardar_direccion) {
                        $conteo = Direccion::where('user_id', auth()->id())->count();
                        if ($conteo < 3) {
                            if ($this->es_principal) {
                                Direccion::where('user_id', auth()->id())->update(['es_principal' => false]);
                            }

                            Direccion::create([
                                'user_id' => auth()->id(),
                                'nombre' => $this->nombre,
                                'telefono' => $this->telefono,
                                'direccion' => $this->direccion,
                                'referencia' => $this->referencia,
                                'es_principal' => ($conteo == 0) ? true : $this->es_principal
                            ]);
                        }
                    }
                }
            }

            $rutaImagen = $this->comprobante->store('pagos', 'public');
            $imagen = basename($rutaImagen);

            $orden = Orden::create([
                'user_id' => auth()->id(),
                'negocio_id' => $this->negocio->id,
                'subtotal' => $this->subtotal,
                'costo_envio' => $this->costo_envio,
                'total' => $this->total,
                'direccion_entrega' => $textoDireccion,
                'referencia' => $textoReferencia ?? null,
                'telefono' => $textoTelefono ?? null,   
                'estado' => 'pendiente',
                'imagen_pago' => $imagen
            ]);

            foreach ($this->itemsCheckout as $item) {
                OrdenItem::create([
                    'orden_id' => $orden->id,
                    'producto_id' => $item->producto_id,
                    'nombre_producto' => $item->producto->nombre,
                    'cantidad' => $item->cantidad,
                    'precio_unitario' => $item->precio_unitario,
                    'subtotal' => $item->subtotal
                ]);
                $item->delete();
            }
            
            return $orden;
        });

        return redirect()->route('orden.exito', ['orden' => $orden->id]);
    }

    public function render()
    {
        $direccionesUsuario = Direccion::where('user_id', auth()->id())->get();

        return view('livewire.checkout-component', [
            'direccionesUsuario' => $direccionesUsuario
        ]);
    }
}
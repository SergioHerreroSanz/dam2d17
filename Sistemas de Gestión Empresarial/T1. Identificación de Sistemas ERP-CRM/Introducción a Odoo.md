# Módulo de ventas
* Módulo de ventas: El módulo de ventas se va a encargar de la gestión de las ventas de la empresa, e instalará además módulos horizontales al negocio, como por ejemplo el de contabilidad.
* Presupuestos: El presupuesto va a determinar cual será el importe de los productos de un pedido. También será llamado cotización de venta (sales quotation). El flujo que lleva Odoo a la hora de generar presupuestos es:
	1. Presupuesto
	2. Pedido de venta
	3. Venta
* Venta: Entenderemos por venta cuando se haya facturado el producto vendido, pasa a formar parte del producto de la empresa.
* Estado para facturar: Será una venta no efectuada pendiente de terminar.
* Factura pro-forma: Documento acreditativo con el detalle de una factura (Invoice)
* Cliente
* Comercial

# Módulo de almacén

## Conceptos clave
* Albarán: Vamos a entender por albarán como el documento mercantil que certifica que un envío ha ido enviado correctamente. Este documento es firmado por la persona a la que se le hace la entrega del paquete.
* Lote: Vamos a entender por lote como un conjunto de productos que han sido procesados conjuntamente y que mas adelante pueden ser divididos.
* Diario de existencias: Vamos a entender por diario de existencias como el lugar donde se registren nos asientos contables. Deberá reflejar cualquier operación contable relacionada con las existencias.
* Asiento contable: Vamos a entender asiento contable como anotaciones que se realizan para que quede constancia de operaciones contables.
* Derecho de cobro y derecho de pago: Una factura va a llevar implícito un derecho de cobro si es una factura del cliente, y si es de proveedor llevará implícito el derecho de pago. Las facturas deben estar numeradas ya que se debe quedar registro de cada una de ellas, y además de información de a que productos representa de cara a la fiscalidad de la empresa.

El módulo de almacén va a permitir generar inventariado y alertas de inventariado a través de los planificadores, generar almacenes adicionales que van a ser usados para proveer productos en las ventas.

* Operaciones: Vamos a entender como operaciones a procesos concretos que van a estar dentro de la empresa y recogidos dentro de la propia aplicación. Dichas operaciones van a estar diseñadas por la propia empresa respecto a sus necesidades. La plataforma va a generar algunas por defecto como por ejemplo:
	* Transferencias internas: Va a ser el proceso de mover mercancías desde un almacén interno de la empresa a otro. En una operación de transferencia interna vamos a tener por una parte la empresa proveedora que va a poder ser tanto un cliente como una compañía (dentro de Odoo), que va a ser el origen de la mercancía respecto al producto que va a ser enviado. Vamos a tener ademas la cantidad de producto a enviar, ubicaciones de origen (de donde salen las mercancías),y ubicaciones destino (almacenes de la empresa). Este proceso va a generar como salida un albarán, cuya trazabilidad la podemos seguir desde movimientos de existencias.
	* Recepciones: Va a representar la recepción de mercancías desde proveedores.
	* Control de inventario:
		* Valoración de inventario: Podremos ver la fotografía actual de nuestro inventario para la parte de almacén, mostrando ademas las diferentes operaciones que ha habido de cara al almacén. 
		* Ajuste de inventario: Su funcionalidad es la de realizar un inventariado de todos los productos existentes actualmente. Para ello debemos de seleccionar la ubicación que queremos inventariar y nos hará la fotografía del material que contiene.
	* Planificadores: Los planificadores nos van a permitir realizar ordenes de reabastecimiento bajo determinadas situaciones, como por ejemplo cuando se produzca un pedido de venta podremos planificar que se ejecute una orden de abastecimiento. Los parámetros que se manejarán para ejecutar estos planificadores van a ser:
		* Producto y cantidad de producto que se desea abastecer cuando se ejecute la orden
		* Almacén desde el que se va a producir el abastecimiento
		* Almacén destino
		* Ruta que se va a utilizar: Van a ser configurables y determinarán el lugar de procedencia del producto y de destino. Tendremos rutas de tipo:
			* Pull: Será aquel tipo de ruta que inserte productos a nuestro almacén para ampliar las existencias. Este tipo de ruta genera un documento de tipo albarán.
			* Push: Va a sacar existencias de un almacén concreto a otro destino. Dicho destino va a ser determinado por la propia operación.
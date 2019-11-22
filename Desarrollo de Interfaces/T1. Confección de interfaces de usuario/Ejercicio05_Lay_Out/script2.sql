use desarrollo
CREATE TABLE [dbo].[Textos](
	idTexto int NOT NULL IDENTITY(1,1) PRIMARY KEY,
	campo [varchar](50) NOT NULL,
	valor [varchar](100) NOT NULL,
	idioma [varchar](50) NOT NULL
) ON [PRIMARY]
GO

INSERT INTO [dbo].[Textos] ([campo],[valor],[idioma])
      VALUES('lblTitulo','Formulario de insercción de datos de usuario','es-ES'),
	 ('gbxInformacionPersonal','Información personal','es-ES'),
	 ('lblNombre','Nombre','es-ES'),
	 ('lblApellidos','Apellidos','es-ES'),
	 ('lblCorreo','Correo','es-ES'),
	 ('gbxTarjeta','Tarjeta','es-ES'),
	 ('lblTipoDeTarjeta','Tipo de tarjeta','es-ES'),
	 ('lblPropietario','Propietario','es-ES'),
	  ('lblNumeroDeTarjeta','Número de tarjeta','es-ES'),
	  ('lblCvv2','CVV2','es-ES'),
	  ('lblFechaDeCaducidad','Fecha de caducidad','es-ES'),
	  ('gbxDireccionDeFacturacion','Dirección de facturación','es-ES'),
	  ('lblDireccion','Dirección','es-ES'),
	  ('lblCiudad','Ciudad','es-ES'),
	  ('lblComunidad','Comunidad','es-ES'),
	  ('lblC.P.','C.P.','es-ES'),
	  ('lblPais','País','es-ES'),
	  ('lblTelefono','Teléfono','es-ES'),
	  ('chbxCertifico','Certifico que soy mayor de edad y acepto los términos.','es-ES');
GO

INSERT INTO [dbo].[Textos] ([campo],[valor],[idioma])
	 VALUES('lblTitulo','Please complete the form below','en-EN'),
	  ('gbxInformacionPersonal','Personal information','en-EN'),
	  ('lblNombre','First name','en-EN'),
	  ('lblApellidos','Last name','en-EN'),
	  ('lblCorreo','Email','en-EN'),
	  ('gbxTarjeta','Credit card information','en-EN'),
	  ('lblTipoDeTarjeta','Credit card type','en-EN'),
	  ('lblPropietario','Card holder','en-EN'),
	  ('lblNumeroDeTarjeta','Card number','en-EN'),
	  ('lblCvv2','CVV2','en-EN'),
	  ('lblFechaDeCaducidad','Exp. date','en-EN'),
	  ('gbxDireccionDeFacturacion','Billing address','en-EN'),
	  ('lblDireccion','Street address','en-EN'),
	  ('lblCiudad','City','en-EN'),
	  ('lblComunidad','State','en-EN'),
	  ('lblC.P.','ZIP','en-EN'),
	  ('lblPais','County','en-EN'),
	  ('lblTelefono','Phone','en-EN'),
	  ('chbxCertifico','Check here to certify that you are 18 years of age or older and agree to the terms this purchase.','en-EN');

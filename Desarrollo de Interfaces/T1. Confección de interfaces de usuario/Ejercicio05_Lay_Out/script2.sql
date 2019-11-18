use desarrollo
CREATE TABLE [dbo].[Formularios2](
	idTexto int NOT NULL IDENTITY(1,1) PRIMARY KEY,
	campo [varchar](50) NOT NULL,
	valor [varchar](100) NOT NULL,
	idioma [varchar](50) NOT NULL
) ON [PRIMARY]
GO

INSERT INTO [dbo].[Formularios2] ([campo],[valor],[idioma])
      VALUES('lblTitulo','Formulario de insercción de datos de usuario','es'),
	 ('gbxInformacionPersonal','Información personal','es'),
	 ('lblNombre','Nombre','es'),
	 ('lblApellidos','Apellidos','es'),
	 ('lblCorreo','Correo','es'),
	 ('gbxTarjeta','Tarjeta','es'),
	 ('lblTipoDeTarjeta','Tipo de tarjeta','es'),
	 ('lblPropietario','Propietario','es'),
	  ('lblNumeroDeTarjeta','Número de tarjeta','es'),
	  ('lblCvv2','CVV2','es'),
	  ('lblFechaDeCaducidad','Fecha de caducidad','es'),
	  ('gbxDireccionDeFacturacion','Dirección de facturación','es'),
	  ('lblDireccion','Dirección','es'),
	  ('lblCiudad','Ciudad','es'),
	  ('lblComunidad','Comunidad','es'),
	  ('lblC.P.','C.P.','es'),
	  ('lblPais','País','es'),
	  ('lblTelefono','Teléfono','es'),
	  ('chbxCertifico','Certifico que soy mayor de edad y acepto los términos.','es');
GO

INSERT INTO [dbo].[Formularios2] ([campo],[valor],[idioma])
	 VALUES('lblTitulo','Please complete the form below','en'),
	  ('gbxInformacionPersonal','Personal information','en'),
	  ('lblNombre','First name','en'),
	  ('lblApellidos','Last name','en'),
	  ('lblCorreo','Email','en'),
	  ('gbxTarjeta','Credit card information','en'),
	  ('lblTipoDeTarjeta','Credit card type','en'),
	  ('lblPropietario','Card holder','en'),
	  ('lblNumeroDeTarjeta','Card number','en'),
	  ('lblCvv2','CVV2','en'),
	  ('lblFechaDeCaducidad','Exp. date','en'),
	  ('gbxDireccionDeFacturacion','Billing address','en'),
	  ('lblDireccion','Street address','en'),
	  ('lblCiudad','City','en'),
	  ('lblComunidad','State','en'),
	  ('lblC.P.','ZIP','en'),
	  ('lblPais','County','en'),
	  ('lblTelefono','Phone','en'),
	  ('chbxCertifico','Check here to certify that you are 18 years of age or older and agree to the terms this purchase.','en');

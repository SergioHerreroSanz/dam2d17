CREATE DATABASE desarrollo
GO

use desarrollo
CREATE TABLE [dbo].[Formularios](
	idFormulario int NOT NULL PRIMARY KEY,
	formulario [varchar](50) NOT NULL
) ON [PRIMARY]
GO

INSERT INTO [dbo].[Formularios] ([idFormulario],[formulario])
     VALUES (1,'Formulario de insercción de datos de usuario');
GO



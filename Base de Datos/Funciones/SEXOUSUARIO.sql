create or replace FUNCTION sexoUsuario(u_sexo IN usuarios.sexo%TYPE)
RETURN NUMBER IS u_sexosolucion usuarios.sexo%TYPE;
BEGIN
SELECT count (*) INTO u_sexosolucion FROM usuarios
WHERE sexo=u_sexo;
RETURN (u_sexosolucion);
END;
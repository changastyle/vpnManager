-- Crea un nuevo usuario para adsl
-- Buscar el sig adsl y los id (consecutivos)
-- Cambiar los datos y ejecutar

INSERT INTO radcheck(
            id, username, attribute, op, value, reint, observaciones)
    VALUES (216, 'adsl_052', 'User-Password', '==', '1nTr4l0t', 0, 'De donde?');

INSERT INTO radreply(
            id, username, attribute, op, value)
    VALUES (181, 'adsl_052', 'Framed-IP-Address', '=', '172.36.200.52');

INSERT INTO radreply(
            id, username, attribute, op, value)
    VALUES (182, 'adsl_052', 'Framed-IP-Netmask', '=', '255.255.255.0');


id integer NOT NULL DEFAULT nextval('hibernate_sequence'::regclass),
  id serial NOT NULL,
  username character varying(64) NOT NULL DEFAULT ''::character varying,
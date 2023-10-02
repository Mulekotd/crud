CREATE SEQUENCE crud_id_seq START 1;

CREATE TABLE IF NOT EXISTS public.crud
(
    id integer NOT NULL DEFAULT nextval('crud_id_seq'::regclass),
    name character varying(255) COLLATE pg_catalog."default",
    email character varying(255) COLLATE pg_catalog."default",
    age integer,
    CONSTRAINT crud_pkey PRIMARY KEY (id)
)
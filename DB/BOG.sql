PGDMP                          y            BOG    12.4    12.4     "           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            #           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            $           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            %           1262    73728    BOG    DATABASE     �   CREATE DATABASE "BOG" WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'English_United States.1252' LC_CTYPE = 'English_United States.1252';
    DROP DATABASE "BOG";
                postgres    false            �            1259    73753    tb_bog_oras_api_user    TABLE     �   CREATE TABLE public.tb_bog_oras_api_user (
    id integer NOT NULL,
    name character varying,
    api_username character varying,
    api_password character varying
);
 (   DROP TABLE public.tb_bog_oras_api_user;
       public         heap    postgres    false            �            1259    73751    tb_bog_oras_api_user_id_seq    SEQUENCE     �   CREATE SEQUENCE public.tb_bog_oras_api_user_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.tb_bog_oras_api_user_id_seq;
       public          postgres    false    207            &           0    0    tb_bog_oras_api_user_id_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public.tb_bog_oras_api_user_id_seq OWNED BY public.tb_bog_oras_api_user.id;
          public          postgres    false    206            �            1259    73729    tb_upload_returns    TABLE     !  CREATE TABLE public.tb_upload_returns (
    id integer NOT NULL,
    revision_id character varying(40),
    return_type_id character varying(40),
    clear_data character varying(10),
    filename character varying(70),
    created_at timestamp with time zone DEFAULT now(),
    return_id character varying(200),
    return_name character varying(500),
    return_reference character varying(100),
    "return_endDate" character varying(120),
    return_status character varying(50),
    flag character varying DEFAULT 'N'::character varying
);
 %   DROP TABLE public.tb_upload_returns;
       public         heap    postgres    false            �            1259    73733    tb_upload_returns_id_seq    SEQUENCE     �   CREATE SEQUENCE public.tb_upload_returns_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.tb_upload_returns_id_seq;
       public          postgres    false    202            '           0    0    tb_upload_returns_id_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.tb_upload_returns_id_seq OWNED BY public.tb_upload_returns.id;
          public          postgres    false    203            �            1259    73735    users    TABLE       CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    api_username character varying,
    api_password character varying,
    role character varying,
    user_role character varying DEFAULT 'N'::character varying
);
    DROP TABLE public.users;
       public         heap    postgres    false            �            1259    73741    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public          postgres    false    204            (           0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
          public          postgres    false    205            �
           2604    73756    tb_bog_oras_api_user id    DEFAULT     �   ALTER TABLE ONLY public.tb_bog_oras_api_user ALTER COLUMN id SET DEFAULT nextval('public.tb_bog_oras_api_user_id_seq'::regclass);
 F   ALTER TABLE public.tb_bog_oras_api_user ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    207    206    207            �
           2604    73743    tb_upload_returns id    DEFAULT     |   ALTER TABLE ONLY public.tb_upload_returns ALTER COLUMN id SET DEFAULT nextval('public.tb_upload_returns_id_seq'::regclass);
 C   ALTER TABLE public.tb_upload_returns ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    203    202            �
           2604    73744    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    205    204                      0    73753    tb_bog_oras_api_user 
   TABLE DATA           T   COPY public.tb_bog_oras_api_user (id, name, api_username, api_password) FROM stdin;
    public          postgres    false    207                     0    73729    tb_upload_returns 
   TABLE DATA           �   COPY public.tb_upload_returns (id, revision_id, return_type_id, clear_data, filename, created_at, return_id, return_name, return_reference, "return_endDate", return_status, flag) FROM stdin;
    public          postgres    false    202   _                  0    73735    users 
   TABLE DATA           �   COPY public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at, api_username, api_password, role, user_role) FROM stdin;
    public          postgres    false    204   �!       )           0    0    tb_bog_oras_api_user_id_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.tb_bog_oras_api_user_id_seq', 1, true);
          public          postgres    false    206            *           0    0    tb_upload_returns_id_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.tb_upload_returns_id_seq', 7, true);
          public          postgres    false    203            +           0    0    users_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.users_id_seq', 3, true);
          public          postgres    false    205            �
           2606    73761 .   tb_bog_oras_api_user tb_bog_oras_api_user_pkey 
   CONSTRAINT     l   ALTER TABLE ONLY public.tb_bog_oras_api_user
    ADD CONSTRAINT tb_bog_oras_api_user_pkey PRIMARY KEY (id);
 X   ALTER TABLE ONLY public.tb_bog_oras_api_user DROP CONSTRAINT tb_bog_oras_api_user_pkey;
       public            postgres    false    207            �
           2606    73746 (   tb_upload_returns tb_upload_returns_pkey 
   CONSTRAINT     f   ALTER TABLE ONLY public.tb_upload_returns
    ADD CONSTRAINT tb_upload_returns_pkey PRIMARY KEY (id);
 R   ALTER TABLE ONLY public.tb_upload_returns DROP CONSTRAINT tb_upload_returns_pkey;
       public            postgres    false    202            �
           2606    73748    users users_email_unique 
   CONSTRAINT     T   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);
 B   ALTER TABLE ONLY public.users DROP CONSTRAINT users_email_unique;
       public            postgres    false    204            �
           2606    73750    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            postgres    false    204               9   x�3�tr	����LJ-.)���+�O,�t���3���s9���ML���b���� "��         :  x���=k�@��󯸽�#龽%�@�xh��\b���s�mH�}�J�R(hz=�b�,��z�����"R��
����P���f�y������hPj�� �tÅ
 ���.P �u�y d���L3e-��q��7`H�L���P�K��6�H �dE����C%T
^�u��Q��7��i��8@T(�{�g�!����p�����!���z�Α^���B|���"��-���s6��.�eΞ��=cH����ǀD鿝骠�� ���ɰm�S�Xv��M�v�ƶ����v���A�c�ϳ,� 2�G         |   x�3�t�(�,.�L�Sp,�(��LL������,H,.6426���uu�L��L�M���5%d:$f%%�e�%��mH�KO5��/�����2���wr��,-N-B��q��qqq ��,     
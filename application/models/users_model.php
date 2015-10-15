<?php
class users_model extends Pi_Model{
	/**
    * Busca Usuario por usuario y password, funcion principla de login
    * @param string $user
    * @param string $pwd
    * @return array
    */
	public function search_user_for_login($user, $pwd){
		//print_debug($user);
		// DB Info
		$tbl    = $this->tbl;
		$query  = "	SELECT 
						 U.id_usuario
						,P.id_personal
						,CONCAT_WS(' ', P.nombre, P.paterno ,P.materno) as name
						,P.nombre
						,P.paterno 
						,P.materno
						,P.telefono as user_telefono
						,P.mail
						,P.avatar as avatar_user
						,Pa.id_pais
						,Pa.pais
						,Pa.dominio
						,Pa.avatar as avatar_pais
						,Pa.moneda
						,E.id_empresa
						,E.empresa
						,E.razon_social
						,E.rfc
						,E.direccion
						,E.telefono
						,S.id_sucursal
						,S.sucursal
						,N.id_perfil
						,N.perfil
						,U.id_puesto
						,U.id_area
						,A.area
						,Ap.puesto
						,N.id_menu_n1
						,N.id_menu_n2
						,N.id_menu_n3
						,U.id_menu_n1 as user_id_menu_n1
						,U.id_menu_n2 as user_id_menu_n2
						,U.id_menu_n3 as user_id_menu_n3
						,C.timestamp
						,U.activo
						,C.user
					FROM $tbl[usuarios] U
					left join $tbl[personales] P on U.id_personal = P.id_personal
					left join $tbl[claves]     C on U.id_clave    = C.id_clave
					left join $tbl[perfiles]   N on U.id_perfil  = N.id_perfil
					left join $tbl[paises]     Pa on U.id_pais    = Pa.id_pais
					left join $tbl[empresas]   E on U.id_empresa  = E.id_empresa
					left join $tbl[sucursales] S on U.id_sucursal = S.id_sucursal
					left join $tbl[administracion_areas] A on U.id_puesto = A.id_administracion_areas
					left join $tbl[administracion_puestos] Ap on U.id_area = Ap.id_administracion_puestos
					WHERE md5(C.user) = '$user' AND C.pwd = '$pwd' AND U.activo = 1
					AND  C.activo = 1
					ORDER BY 
						N.id_perfil;
				";
		
		$query = $this->db->query($query);
		if($query->num_rows() >= 1){
			return $query->result_array();
		}		
	}

	/**
    * Busca Usuario por su id unico de registro
    * @param integer $id_user
    * @return array
    */
	public function search_user_for_id($id_user){
		
		$tbl    = $this->tbl;
		$query  = "	SELECT 
						U.id_usuario
						,P.id_personal
						,CONCAT_WS(' ', P.nombre, P.paterno ,P.materno) as name
						,P.nombre
						,P.paterno 
						,P.materno
						,P.telefono as user_telefono
						,P.mail
						,P.avatar as avatar_user
						,Pa.id_pais
						,Pa.pais
						,Pa.dominio
						,Pa.avatar as avatar_pais
						,Pa.moneda
						,E.id_empresa
						,E.empresa
						,E.razon_social
						,E.rfc
						,E.direccion
						,E.telefono
						,S.id_sucursal
						,S.sucursal
						,N.id_perfil
						,N.perfil
						,U.id_puesto
						,U.id_area
						,A.area
						,Ap.puesto
						,N.id_menu_n1
						,N.id_menu_n2
						,N.id_menu_n3
						,U.id_menu_n1 as user_id_menu_n1
						,U.id_menu_n2 as user_id_menu_n2
						,U.id_menu_n3 as user_id_menu_n3
						,C.timestamp
						,U.activo
						,C.user
					FROM $tbl[usuarios] U
					left join $tbl[personales] P on U.id_personal = P.id_personal
					left join $tbl[claves]     C on U.id_clave    = C.id_clave
					left join $tbl[perfiles]   N on U.id_perfil  = N.id_perfil
					left join $tbl[paises]     Pa on U.id_pais    = Pa.id_pais
					left join $tbl[empresas]   E on U.id_empresa  = E.id_empresa
					left join $tbl[sucursales] S on U.id_sucursal = S.id_sucursal
					left join $tbl[administracion_areas] A on U.id_puesto = A.id_administracion_areas
					left join $tbl[administracion_puestos] Ap on U.id_area = Ap.id_administracion_puestos
					WHERE U.id_usuario = $id_user  AND U.activo = 1;
				";
		$query = $this->db->query($query);
		if($query->num_rows() >= 1){
			return $query->result_array();
		}		
	}
}
?>
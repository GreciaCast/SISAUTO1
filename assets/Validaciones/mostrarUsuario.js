function mostrarUsu(nombre,telefono,correo,direccion,dui,usuario,tipo){
	$("#nombreUsu").val(nombre);
	$("#telefonoUsu").val(telefono);
	$("#correoUsu").val(correo);
	$("#direccionUsu").val(direccion);
	$("#duiUsu").val(dui);
	$("#nombreusuUsu").val(usuario);
	if(tipo == '1'){
		var aux = 'Empleado';
	}else{
		var aux = 'Administrador';
	}
	$("#tipoUsu").val(aux);	
}

function editarUsu(nombre,telefono,correo,direccion,dui,usuario,tipo,idusuario){
	$("#nombreUsuEditar").val(nombre);
	$("#telefonoUsuEditar").val(telefono);
	$("#email").val(correo);
	$("#direccionUsuEditar").val(direccion);
	$("#duiUsuEditar").val(dui);
	$("#nombreusuUsuEditar").val(usuario);
	if(tipo == '1'){
		var aux = 'Empleado';
	}else{
		var aux = 'Administrador';
	}
	$("#tipoUsuEditar").val(aux);	
	$("#idusuario").val(idusuario);
}

function editarUsuContrasena(usuario,tipo,idusuario){
	$("#nombreusuUsuContrasenaEditar").val(usuario);
	if(tipo == '1'){
		var aux = 'Empleado';
	}else{
		var aux = 'Administrador';
	}
	$("#tipoUsuContrasenaEditar").val(aux);	
	console.log(idusuario);
	$("#idusuarioContrasena").val(idusuario);
}
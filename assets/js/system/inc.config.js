function path(Folder){
// Obtiene Carpeta raiz
    if(!Folder){Folder='CodeIgniter-3.0.2';}
    Folder = Folder + '/';
    var dominio = document.domain;
    var raiz = window.location.pathname.split(Folder);
    var ruta = raiz[0] + Folder;
    return ruta;
}


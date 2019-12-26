window.onload = function () {

    //получаем идентификатор элемента
    var a = document.getElementById('switch');
    
    //вешаем на него событие
    a.onclick = function() {
        //производим какие-то действия
       var block = document.getElementsByClassName('skritBlock');
       // block.style.display = 'block';
       document.getElementById('skritBlock').style.display = 'block';
        //предотвращаем переход по ссылке href
        return false;
    }
}
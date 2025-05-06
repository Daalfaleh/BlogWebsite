function toggleNavBar() {
    let nav_items = document.getElementsByClassName('secondary');
    for(let i = 0; i < nav_items.length; i++) {
        if (nav_items[i].style.display == 'block')
            nav_items[i].style.display = 'none';
        else
            nav_items[i].style.display = 'block';     
    } 
}

function copyURL() {
    var dummy = document.createElement('input'),
    text = window.location.href;
    document.body.appendChild(dummy);
    dummy.value = text;
    dummy.select();
    document.execCommand('copy');
    document.body.removeChild(dummy);
    alert("URL Copied to Clipboard!");
}
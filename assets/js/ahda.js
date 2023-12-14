const sidebarTitle = document.querySelectorAll('.sidebar-title');

// alert(sidebarTitle.length);

for (let i = 0; i < sidebarTitle.length; i++){
    sidebarTitle[i].addEventListener('click',
    lockColor.bind(this, sidebarTitle[i]));
}

function lockColor(item) {
    // alert(sidebarTitle.length);
    for (let i = 0; i < sidebarTitle.length; i++){
        sidebarTitle[i].classList.remove('lock-color');
    }
    item.classList.add('lock-color');
}

$(document).ready(function() {''
    let changeDiv;

    if (window.location.href.indexOf("category") > -1) {
        changeDiv = document.querySelector('.sidebar-category');
    } else if (window.location.href.indexOf("dashboard") > -1) {
        changeDiv = document.querySelector('.sidebar-dashboard');
    } else if (window.location.href.indexOf("book") > -1) {
        changeDiv = document.querySelector('.sidebar-books');
    } else if (window.location.href.indexOf("transaction") > -1) {
        changeDiv = document.querySelector('.sidebar-transaction');
    } else if (window.location.href.indexOf("history") > -1) {
        changeDiv = document.querySelector('.sidebar-history');
    } else if (window.location.href.indexOf("user") > -1) {
        changeDiv = document.querySelector('.sidebar-usermng');
    } else if (window.location.href.indexOf("explore") > -1) {
        changeDiv = document.querySelector('.sidebar-usermng');
    }

    for (let i = 0; i < sidebarTitle.length; i++){
        sidebarTitle[i].classList.remove('lock-color');
    }
    changeDiv.classList.add('lock-color');
  });
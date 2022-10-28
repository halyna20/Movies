function validateNickname(item) {
    let text = removeSpace(item);
    let regular = /^[a-z0-9_-]{2,16}$/;
    if(text.match(regular)) {
        return text;
    }
    return false;
}
function removeSpace(item){
    let text = item.val().replace(/\s/g,'');
    return text;
}

function validateText(item) {
    let text = removeSpace(item);
    let regular = /[а-щА-ЩЬьЮюЯяЇїІіЄєҐґ]{2,18}/;
    if(text.match(regular)) {
        return text;
    }
    return false;
}

function validatePass(item) {
    let pass = removeSpace(item);
    let regular = /^[a-z0-9_-]{8,18}$/;
    if(pass.match(regular)) {
        return pass;
    }
    return false;
}

function validateFilmName(item) {
    let text = removeSpace(item);
    let regular = /^[a-zA-Zа-щА-ЩЬьЮюЯяЇїІіЄєҐґ\/0-9_-]{2,16}$/;
    if(text.match(regular)) {
        return text;
    }
    return false;
}

function validateSearch(text) {
    let txt = text.val();
    let regular = /[^a-zа-яё]/gi;
    let newTxt = txt.replace(regular, '');
    if(newTxt) {
        return newTxt;
    }
    return false;
}
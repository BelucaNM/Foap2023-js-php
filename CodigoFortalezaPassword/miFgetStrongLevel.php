function getStrongLevel(password) {
    var level = 0;
    level += password.length > 6 ? 1 : 0;
    level += /[!@#$%^&*?_~]{2,}/.test(password) ? 1 : 0;
    level += /[a-z]{2,}/.test(password) ? 1 : 0;
    level += /[A-Z]{2,}/.test(password) ? 1 : 0;
    level += /[0-9]{2,}/.test(password) ? 1 : 0;
    return level;
}
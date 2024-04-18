


function getStrongLevel(value) {
    // value es string
    let level = 0;
    let MinLength =8;
    if (value.length >= MinLength) level ++;
    if (hasLowercase(value)) level ++;
    if (hasUppercase(value)) level ++;
    if (hasNumber(value) || hasSymbol(value)) level ++;
    return level;}

    
const hasLowercase = (value) => {
return /[a-z]/.test(value)
};
const hasNumber = (value) => {
return /[0-9]/.test(value)
};
const hasSymbol = (value) => {
return /[-~`!@#$%^&*()_+={[}\]|\\:;"'<,>.?/]/.test(value)
};
const hasUppercase = (value) => {
return /[A-Z]/.test(value)
};


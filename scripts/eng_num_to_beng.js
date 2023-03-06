var finalEnglishToBanglaNumber = {
    0: "০",
    1: "১",
    2: "২",
    3: "৩",
    4: "৪",
    5: "৫",
    6: "৬",
    7: "৭",
    8: "৮",
    9: "৯",
};

function getDigitBanglaFromEnglish(retStr) {
    for (var x in finalEnglishToBanglaNumber) {
    retStr = retStr.replace(
        new RegExp(x, "g"),
        finalEnglishToBanglaNumber[x]
    );
    }
    return retStr;
};
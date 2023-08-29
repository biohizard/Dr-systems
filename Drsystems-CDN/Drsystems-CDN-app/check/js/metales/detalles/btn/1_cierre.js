



function zerocien(x) {
    //x >1,=1,<9,=9   x = 1...9                      0009
    if (x == 1 || x <= 9) {
        y = "000" + x;
        //x >= 10 and x x == 99 x = 10...99     0099
    } else if (x == 10 || x <= 99) {
        y = "00" + x;
        //x >= 100 and x x == 999 x = 100...999 0999
    } else if (x == 100 || x <= 999) {
        y = "0" + x;
        //x >= 1000 x = 1000 .... °°            9999
    } else if (x >= 1000) {
        y = x;
    } else { y = x; }

    return y;
}
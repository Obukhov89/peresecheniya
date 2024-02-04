export default function month_name (numberMonth) {
    let monthName = '';

    switch (numberMonth)
    {
        case 1:
            monthName = 'января';
            break;
        case 2:
            monthName = 'февраля';
            break;
        case 3:
            monthName = 'марта';
            break;
        case 4:
            monthName = 'апреля';
            break;
        case 5:
            monthName = 'мая';
            break;
        case 6:
            monthName = 'июня';
            break;
        case 7:
            monthName = 'июля';
            break;
        case 8:
            monthName = 'августа';
            break;
        case 9:
            monthName = 'сентября';
            break;
        case 10:
            monthName = 'октября';
            break;
        case 11:
            monthName = 'ноября';
            break;
        case 12:
            monthName = 'декабря';
            break;
    }
    return monthName;
}

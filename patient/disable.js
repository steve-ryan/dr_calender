function onlyTheseWeekDays(arr) {
  var days = [];
  if (arr instanceof Array) {
    days = arr;
  } else if (!isNaN(Number(arr))) {
    days.push(arr);
  }
  return function (date) {
    var dayOfWeek = date.getDay(),
      i;
    for (i = 0; i < days.length; i += 1) {
      if (days[i] === dayOfWeek) {
        return [true];
      }
    }
    return [false];
  };
}

$(function(){
  setInterval(function(){
    var now = new Date();
    var y = now.getFullYear();
    var m = now.getMonth() + 1;
    var d = now.getDate();
    var w = now.getDay();
    var wd = ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'];
    var h = now.getHours();
    var mi = now.getMinutes();
    var s = now.getSeconds();
    var mm = ('0' + m).slice(-2);
    var dd = ('0' + d).slice(-2);
    var hh = ('0' + h).slice(-2);
    var mmi = ('0' + mi).slice(-2);
    var ss = ('0' + s).slice(-2);
    $('#myClock').text(y + '年' + mm + '月' + dd + '日' + hh + '時' + mmi + '分' + ss + '秒' + '(' + wd[w] + ')');
    $('#myClock_day').html(y + '<span>.</span>' + mm + '<span>.</span>' + dd);
    $('#myClock_time_h').text(hh);
    $('#myClock_time_m').text(mmi);
    $('#myClock_wd').text(wd[w]);
  }, 1000);
});
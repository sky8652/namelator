
// 1 2 3 4 5 6 7 8 9 10
// 甲子 乙丑 丙寅 丁卯 戊辰 己巳 庚午 辛未 壬申 癸酉
// 11 12 13 14 15 16 17 18 19 20
// 甲戌 乙亥 丙子 丁丑 戊寅 己卯 庚辰 辛己 壬午 癸未
// 21 22 23 24 25 26 27 28 29 30
// 甲申 乙酉 丙戌 丁亥 戊子 己丑 庚寅 辛卯 壬辰 癸巳
// 31 32 33 34 35 36 37 38 39 40
// 甲午 乙未 丙申 丁酉 戊戌 己亥 庚子 辛丑 壬寅 癸卯
// 41 42 43 44 45 46 47 48 49 50
// 甲辰 乙巳 丙午 丁未 戊申 己酉 庚戌 辛亥 壬子 癸丑
// 51 52 53 54 55 56 57 58 59 60
// 甲寅 乙卯 丙辰 丁巳 戊午 己未 庚申 辛酉 壬戌 癸亥
var jiazi_arr=["甲子","乙丑","丙寅","丁卯","戊辰","己巳","庚午","辛未","壬申","癸酉",
             "甲戌","乙亥","丙子","丁丑","戊寅","己卯","庚辰","辛己","壬午","癸未",
             "甲申","乙酉","丙戌","丁亥","戊子","己丑","庚寅","辛卯","壬辰","癸巳",
             "甲午","乙未","丙申","丁酉","戊戌","己亥","庚子","辛丑","壬寅","癸卯",
             "甲辰","乙巳","丙午","丁未","戊申","己酉","庚戌","辛亥","壬子","癸丑",
             "甲寅","乙卯","丙辰","丁巳","戊午","己未","庚申","辛酉","壬戌","癸亥",
    ];
var day_table=[
        31, 36, 42, 47, 52, 57, 3, 8, 13, 18,
        24, 29, 34, 39, 45, 50, 55, 0, 6, 11,
        16,21,27,32,37,42,48,53,58,3,
        9, 14, 19, 24, 30, 35, 40, 45,51,56,
        1, 6, 12,17,22, 27, 33, 38, 43, 48,
        54, 59, 4, 9, 15, 20, 25, 30,36,41,
        46, 51, 57, 2, 7,12, 18,23, 28, 33,
        39, 44, 49, 54, 0, 5, 10, 15, 21, 26,
        31, 36, 42, 47, 52, 57, 3, 8, 13, 18,
        24, 29, 34, 39, 45,50,55,0,6,11,

];
var arr2=['甲','乙','丙','丁','戊','己','庚','辛','壬','癸'];
var arr3=['子','丑','寅','卯','辰','巳','午','未','申','酉','戌','亥'];
var wuxing=['gold','woods','waters','fires','soil'];

//根据生辰八字算五行
function getWuxing(string){
    console.log(string);
    var arr=[0,0,0,0,0];
    for(var i=0;i<string.length;i++){
        if(string[i]=='甲'||string[i]=='乙'|| string[i]=='寅' || string[i] == '卯'){
           arr[1]++;
        }else if(string[i]=='丙'||string[i]=='丁'|| string[i]=='巳' || string[i] == '午'){
            arr[3]++;
        }else if(string[i]=='戊'||string[i]=='己'||string[i]=='辰'||string[i]=='丑'||string[i]=='戌'||string[i]=='未'){
            arr[4] ++;
        }else if(string[i]=='庚'||string[i]=='辛'||string[i]=='申'||string[i]=='酉'){
            arr[0] ++;
        }else{
            arr[2] ++;
        }
    }
    var str='';
    for(var c=0;c<arr.length;c++){
    
        if(arr[c]>0){
             str += arr[c]+wuxing[c]+' ';
        }
    }
    return str;

}

//甲乙丙丁戊己庚辛壬癸





today=new Date();  
function initArray(){  
   this.length=initArray.arguments.length  
   for(var i=0;i<this.length;i++)  
   this[i+1]=initArray.arguments[i] }  
   var d=new initArray(  
     "星期日",  
     "星期一",  
     "星期二",  
     "星期三",  
     "星期四",  
     "星期五",  
     "星期六");  
// document.write(today.getFullYear(),"年",today.getMonth()+1,"月",today.getDate(),"日 ",d[today.getDay()+1]," ");  
  
calendar = new Date();  
month = calendar.getMonth();  
date = calendar.getDate();  
  

  
  
  
  
/*农历部分*/  
  
var CalendarData=new Array(100);  
var madd=new Array(12);  
var tgString="甲乙丙丁戊己庚辛壬癸";  
var dzString="子丑寅卯辰巳午未申酉戌亥";  
var numString="一二三四五六七八九十";  
var monString="正二三四五六七八九十冬腊";  
var weekString="日一二三四五六";  
// var sx="鼠牛虎兔龙蛇马羊猴鸡狗猪";  
var sx=['rat','cattle','tiger','rabbit','dragon','snake','horse','sheep','monkey','chicken','dog','pig']
var cYear,cMonth,cDay,TheDate;  
CalendarData = new Array(0xA4B,0x5164B,0x6A5,0x6D4,0x415B5,0x2B6,0x957,0x2092F,0x497,0x60C96,0xD4A,0xEA5,0x50DA9,0x5AD,0x2B6,0x3126E, 0x92E,0x7192D,0xC95,0xD4A,0x61B4A,0xB55,0x56A,0x4155B, 0x25D,0x92D,0x2192B,0xA95,0x71695,0x6CA,0xB55,0x50AB5,0x4DA,0xA5B,0x30A57,0x52B,0x8152A,0xE95,0x6AA,0x615AA,0xAB5,0x4B6,0x414AE,0xA57,0x526,0x31D26,0xD95,0x70B55,0x56A,0x96D,0x5095D,0x4AD,0xA4D,0x41A4D,0xD25,0x81AA5,0xB54,0xB6A,0x612DA,0x95B,0x49B,0x41497,0xA4B,0xA164B, 0x6A5,0x6D4,0x615B4,0xAB6,0x957,0x5092F,0x497,0x64B, 0x30D4A,0xEA5,0x80D65,0x5AC,0xAB6,0x5126D,0x92E,0xC96,0x41A95,0xD4A,0xDA5,0x20B55,0x56A,0x7155B,0x25D,0x92D,0x5192B,0xA95,0xB4A,0x416AA,0xAD5,0x90AB5,0x4BA,0xA5B, 0x60A57,0x52B,0xA93,0x40E95);  
madd[0]=0;  
madd[1]=31;  
madd[2]=59;  
madd[3]=90;  
madd[4]=120;  
madd[5]=151;  
madd[6]=181;  
madd[7]=212;  
madd[8]=243;  
madd[9]=273;  
madd[10]=304;  
madd[11]=334;  
  
function GetBit(m,n){  
    return (m>>n)&1;  
}  
function e2c(){  
    TheDate= (arguments.length!=3) ? new Date() : new Date(arguments[0],arguments[1],arguments[2]);  
    var total,m,n,k;  
    var isEnd=false;  
    var tmp=TheDate.getYear();  
    if(tmp<1900){  
    tmp+=1900;  
    }  
    total=(tmp-1921)*365+Math.floor((tmp-1921)/4)+madd[TheDate.getMonth()]+TheDate.getDate()-38;  
    
    if(TheDate.getYear()%4==0&&TheDate.getMonth()>1) {  
    total++;  
    }  
    for(m=0;;m++){  
    k=(CalendarData[m]<0xfff)?11:12;  
    for(n=k;n>=0;n--){  
        if(total<=29+GetBit(CalendarData[m],n)){  
        isEnd=true; break;  
        }  
        total=total-29-GetBit(CalendarData[m],n);  
    }  
    if(isEnd) break;  
    }  
    cYear=1921 + m;  
    cMonth=k-n+1;  
    cDay=total;  
    if(k==12){  
    if(cMonth==Math.floor(CalendarData[m]/0x10000)+1){  
        cMonth=1-cMonth;  
    }     
    if(cMonth>Math.floor(CalendarData[m]/0x10000)+1){  
        cMonth--;  
    }    
    }  
}  
  
function GetcDateString(){  
    // var tmp="";  
    var tmp={};
    // tmp+=tgString.charAt((cYear-4)%10);  
    // tmp+=dzString.charAt((cYear-4)%12);  
    // tmp+="(";  
    tmp.year=tgString.charAt((cYear-4)%10) + dzString.charAt((cYear-4)%12);  
    // tmp.sx=sx.charAt((cYear-4)%12);  
    tmp.sx=sx[(cYear-4)%12];  
    // tmp+=sx.charAt((cYear-4)%12);  
    // tmp+=")年 ";  
    if(cMonth<1){  
    // tmp+="(闰)";  
    // tmp+=monString.charAt(-cMonth-1);  
        tmp.month=-cMonth;
    //   console.log(-cMonth-1);
    }else{  
        tmp.month=cMonth;
    //    console.log(cMonth-1);
    // tmp+=monString.charAt(cMonth-1);  
    }  
    // tmp+="月";  
    // tmp+=(cDay<11)?"初":((cDay<20)?"十":((cDay<30)?"廿":"三十"));  
    // if (cDay%10!=0||cDay==10){  
    // tmp+=numString.charAt((cDay-1)%10);  
    // }  

    
    // console.log("temp",tmp);
    return tmp;  
}  
  
function GetLunarDay(solarYear,solarMonth,solarDay){  
//solarYear = solarYear<1900?(1900+solarYear):solarYear;  
    if(solarYear<1921 || solarYear>2020){  
    return "";  
    }else{  
    solarMonth = (parseInt(solarMonth)>0) ? (solarMonth-1) : 11;  
    e2c(solarYear,solarMonth,solarDay);  
    return GetcDateString();  
    }  
}  
  
// var D=new Date('2020-1-1');  
// var yy=D.getFullYear();  
// var mm=D.getMonth()+1;  
// var dd=D.getDate();  
// var ww=D.getDay();  
// var ss=parseInt(D.getTime() / 1000);  
// if (yy<100) yy="19"+yy;  
// console.log(JSON.stringify(GetLunarDay(yy,mm,dd))) 

// var a=GetLunarDay(yy,mm,dd);
// a的结果为{'year':'己亥'，'sx':'猪'，'month':12}  year为甲子年，sx为生肖，month为农历月份
// console.log(a);
// var nian = a.substring(0,2);
// console.log(nian);









    






    function getDate(jieqi,year){
        var C;
        
        if(parseInt(year/100)+1==20){
            //20世纪
            year = year.toString().substr(2,2);
            switch(jieqi){
                case 'lichun':      
                    return parseInt(year * 0.2422 + 4.6295)-parseInt((year-1)/4); //2 month
                case 'jingzhe':       //3 month
                    C = 5.63;     //惊蛰20世纪C值未找到，这是21世纪的
                    break;
                case 'qingming':      //4月
                    C = 5.59;
                    break;
                case 'lixia':         //5 month
                    C = 6.318;
                    break;
                case 'mangzhong':     //6 month
                    C = 6.5;
                    break;
                case 'xiaoshu':       //7 month 小暑
                    C = 7.928;       
                    break;
                case 'liqiu':        //8 month
                    C = 8.35;
                    break;
                case 'bailu':    //9 month
                    C = 7.646;
                    break;
                case 'hanlu':     //10 month
                    C = 8.44;
                    break;
                case 'lidong':    //11 month
                    C = 8.218;
                    break;
                case 'daxue':     //12 month
                    C = 7.9;
                    break;
                case 'xiaohan':
                    return parseInt(year * 0.2422 + 6.11)-parseInt((year-1)/4);
                    // C = 6.11;
                    break;
                default:
                    break;
    
            }

        }else if(parseInt(year/100)+1==21){
            year = year.toString().substr(2,2);
            //21世纪
            switch(jieqi){
                
                case 'lichun':
                    return parseInt(year * 0.2422 + 3.87)-parseInt((year-1)/4); //2 month
                case 'jingzhe':       //3 month
                    C = 5.63;
                    break;
                case 'qingming':      //4月
                    C = 4.81;
                    break;
                case 'lixia':         //5 month
                    C = 5.52;
                    break;
                case 'mangzhong':     //6 month
                    C = 5.678;
                    break;
                case 'xiaoshu':       //7 month 小暑
                    C = 7.108;       
                    break;
                case 'liqiu':        //8 month
                    C = 7.5;
                    break;
                case 'bailu':    //9 month
                    C = 7.646;
                    break;
                case 'hanlu':     //10 month
                    C = 8.318;
                    break;
                case 'lidong':    //11 month
                    C = 7.438;
                    break;
                case 'daxue':     //12 month
                    C = 7.18;
                    break;
                case 'xiaohan':
                    return parseInt(year * 0.2422 + 5.4055)-parseInt((year-1)/4);
                    // C = 6.11;
                    break;
                default:
                    break;
    
            }

        }else{
            return;
        }
              
        var date = parseInt(year * 0.2422 + C)-parseInt(year/4)
        return date;
    }


  //参考url  https://baijiahao.baidu.com/s?id=1591199213021486805&wfr=spider&for=pc
    function result(year,month,day,timeValue){
        day = parseInt(day);
        console.log(year+'年'+month+'月'+day+'日'+timeValue+'时辰');
        //农历正月起,公历2月起
        var arr=['lichuan','jingzhe','qingming','lixia','mangzhong','xiaoshu','liqiu','bailu','hanli','lidong','daxue','xiaohan'];
       // a的结果为{'year':'己亥'，'sx':'猪'，'month':12}  year为甲子年，sx为生肖，month为农历月份
        var a=GetLunarDay(year,month,day);
        //20世纪
        if(parseInt(year/100)+1==20){
            //20世纪各节气的C值，第二项20 世纪惊蛰的C值未找到，暂拿21世纪的用
            var C_array=[4.6295 , 5.63 , 5.59 , 6.318 ,  6.5 , 7.928 , 8.35 , 7.646 , 8.44 , 8.218 , 7.9 , 6.11];
            
        }else if(parseInt(year/100)+1==21){
            var C_array=[3.87,5.63,4.81,5.52,5.678,7.108,7.5,7.646,8.318,7.438,7.18,5.4055];
        }
        var s_year=year.toString().substr(2,2);
        if (month == 1){   
                    
            var date = parseInt(s_year * 0.2422 + C_array[11])-parseInt((s_year-1)/4);
        }else if(month == 2){
            var date = parseInt(s_year * 0.2422 + C_array[0])-parseInt((s_year-1)/4);
        }else {
            //console.log("C+++++",parseInt(s_year * 0.2422 + C_array[month-2])-parseInt(s_year/4));
            var date = parseInt(s_year * 0.2422 + C_array[month-2])-parseInt(s_year/4);
        }
        //nl_month为按照二十四节气划分，应该为第几个月
        // console.log("day"+day);
        // console.log("date",date);
        if(day<date){

            var nl_month= month - 2;

        }else{
            var nl_month = month - 1;
        }
        // console.log(nl_month);
        // if(month==1 || month==2){
        //     var year_num = (year - 4)%60
        // }else{
        var year_num = (year - 3)%60
        // }
        
        var nian=  year_num>0?jiazi_arr[year_num-1]:'癸亥';

        //计算月
        var firstChar = nian.substring(0,1);
        var zhengyue;
        if(firstChar=='甲'||firstChar=='己'){
            zhengyue='丙寅';
        }else if(firstChar=='乙' || firstChar=='庚'){
            zhengyue = '戊寅';
        }else if(firstChar=='丙' || firstChar=='辛'){
            zhengyue = '庚寅';
        }else if(firstChar=='丁' || firstChar=='壬'){
            zhengyue = '壬寅';
        }else if(firstChar=='戊' || firstChar=='癸'){
            zhengyue = '甲寅';
        }
        var index = jiazi_arr.findIndex(item=>item==zhengyue);
        var yue = jiazi_arr[nl_month - 1 + index];
        


     //计算日
    var moon_table=[
        6,37,0,31,1,32,2,33,4,34,5,35,
    ];
    var ri;
    if(month == 1 || month==2){
        
        var num=day_table[year-1951]+moon_table[month-1]+day;
        
    }else{
        console.log(day_table[year-1950]);
        console.log(moon_table[month-1]);
        var num=day_table[year-1950]+moon_table[month-1]+day;
        console.log(num);
    }
    if(num>60){
        num=num-60;

    }
    console.log('num'+num);
    ri=jiazi_arr[num-1];

    
    //计算时辰
    //算生活八字的第七个字的对应公式
    console.log('ri'+ri);
    var two = arr3[timeValue]; //表示八字里面的第八个字
    var tiangan = ri.substring(0,1);
    var one;  //表示八字里面的第七个字
    //甲乙丙丁戊己庚辛壬癸
    if(tiangan == '己' || tiangan== '庚' || tiangan == '辛' || tiangan == '壬' || tiangan == '癸'){
        one = two;
    }else{
        var tiangan_index = arr2.findIndex(item=>item == tiangan);
        console.log(tiangan_index);
        //计算公式为((m-1)*12+n)%10 m为第几列，n为第几行
        //timevalue 从 0 开始
        var tiangan_num = (tiangan_index * 12 + timeValue +1)%10;
        one = tiangan_num==0?'癸':arr2[tiangan_num-1];
    }
    console.log(a.year+'年'+yue+'月'+ri+'日'+one+two+'时辰');
    return {'wuxing':getWuxing(a.year+yue+ri+one+two),'sx':a.sx};

    






    }  

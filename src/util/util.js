//获取cookie、
export function getCookie(name) {
  var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
  if (arr = document.cookie.match(reg))
    return (decodeURIComponent(arr[2]));
  else
    return null;
}

//设置cookie,增加到vue实例方便全局调用
export function setCookie (name,value,daysToLive) {
  var cookie=name+"="+encodeURIComponent(value);
  if(typeof daysToLive==="number")
       cookie +="; max-age=" +(daysToLive*60*60*24);
  document.cookie=cookie

};

//删除cookie
export function delCookie (name) {
  var exp = new Date();
  exp.setTime(exp.getTime() - 1);
  var cval = getCookie(name);
  if (cval != null)
    document.cookie = name + "=" + cval + ";expires=" + exp.toGMTString();
};
//添加cookie
export function setCookiePlus(name,a,day){
  var list = JSON.parse(getCookie(name));
  var c = 0;
  if (list == null) {
    list = [];
    list.push(a)
  }else{

    for (var b of list) {
      if (b.lid == a.lid) {
        b.count += a.count;
        c = 1;
      }
    }
    if (c == 0) list.push(a)
  }
  setCookie("histroyList", JSON.stringify(list),day);

}

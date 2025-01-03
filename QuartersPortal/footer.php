</div>
    <div id="bodybottomPan">        
    </div>
	
<div id="footermainPan">
  <div id="footerPan">
    <ul class="templateworld">
    <li>copyrights©</li>
    <li><a href="https://www.bitsathy.ac.in/" target="_blank">BIT</a></li>
    </ul>
  </div>
</div>
</body>
<script>
    function client_check() {
        var email = f.email.value
	var mob = f.mobile.value
        var pwd = f.pwd.value
        var cpwd = f.cpwd.value
	if(!check_email(email)) {
	    alert("Invalid Email/Userid")
	    return false
	}
	if(!check_mobile(mob)) {
	    alert("Invalid Mobile Number")
	    return false
	}
        if(pwd!=cpwd) {
            alert("Invalid Confirm Password")
            f.cpwd.focus()
            return false
        }
	return true
    }

    function do_check() {
	var email = f.email.value
	var mob = f.mobile.value
	if(!check_email(email)) {
	    alert("Invalid Email/Userid")
	    return false
	}
	if(!check_mobile(mob)) {
	    alert("Invalid Mobile Number")
	    return false
	}
	return true
    }
        
    function check_email(e) {
	var ep = /^\w+\.{0,1}\w+\@[a-z]+\.([a-z]{3}|[a-z]{2}\.[a-z]{2}){1}$/
	return e.match(ep)
    }
    function check_mobile(m) {
	var mp = /^[987]\d{9}$/
	return m.match(mp)
    }
</script>
</html>
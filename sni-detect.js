(function(d,w) {

    /*
     * Remove logger function + calls
     * for production use.
     */
    function logger(txt)
    {
        if((tmp=document.getElementById('sni-detection-result')))
        {
            tmp.innerHTML = txt;
        }
    }

    logger && logger('Doc is ready to check for SNI.');

    var bu, i, rs, rc=0, maxRetry=6, dt=new Date(), dts=dt.getMilliseconds();
    bu = document.location.toString().split('/'), bu = bu.slice(2,-1).join('/'),
    i = new Image(), i.src= 'https://' + bu + '/pixel.gif?' + dts;
    w.noSSL = (r=d.location.href.match(/[\?\&]nossl=1/)) && r!=null && r.length ? true:false;
    rs= function() {
        if(!w.noSSL && (i.complete || i.readyState === 4))
        {
            logger && logger('<b>Result:</b><br />Your browser supports SNI-SSL vHosts!');

            d.location = document.location.href.replace('http://', 'https://');
        }
        else if (rc < maxRetry)
        {
            rc++;
            w.setTimeout(rs, 25);
        }
        else
        {
            logger && logger('<b>Result:</b><br /> Your browser does NOT support SNI-SSL vHosts!');

            if (!w.noSSL)
            {
                d.location = d.location.href + (d.location.href.indexOf('?')>-1 ? '&' : '?') + 'nossl=1';
            }
        }
    };

    w.setTimeout(rs, 25);
}) (document, window);

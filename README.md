# SSL-SNI-Detection

This is a collection of methods and rules to determine non-supported browser-clients for SSL-SNI (Multiple SSL-Certs on a single IP)

Any suggstions or corrections are welcome by posting it as an [Issue](https://github.com/typoworx-de/SSL-SNI-Detection/issues).

---
*Changelog:*

* Adding JS-Detection for SNI-Support with Meta-Redirect fallback to No-SSL

*ToDo & Ideas*
* Add JavaScript & Server-Site Check for User-Agent-Rules
* Add Logger-Backend for any Client not able to use SNI to add them to Rule-Set for Non-SNI-Clients

---
Sources to also check and notice for further investigations:
* http://caniuse.com/#feat=sni
* https://en.wikipedia.org/wiki/Server_Name_Indication#How_SNI_fixes_the_problem
* http://webmasters.stackexchange.com/questions/69710/which-browsers-support-sni

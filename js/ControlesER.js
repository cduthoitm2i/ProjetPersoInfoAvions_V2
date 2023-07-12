/*
 * ControlesER.js
isEmail
isMDPFort
isCPFR
isTelephoneFR
isEntier
isEntierPositif
isEntierNegatif
isDecimal
isDecimalFR
isNomSansAccent
isNomAvecAccent
isSnakeCase
isCamelCase
isKebabCase
 */

function isEmail(psChaine) {
    let motif = /^[0-9a-zA-Z_-]+([.][0-9a-zA-Z_-]+)?@[0-9a-zA-Z._-]{2,}\.[a-zA-Z]{2,5}$/;
    return motif.test(psChaine);
  }
  
  function isMDPFort(psChaine) {
    let motif = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,16}$/;
    return motif.test(psChaine);
  }
  
  function isCPFR(psChaine) {
    let motif = /[0-9]{5}/;
    return motif.test(psChaine);
  }
  
  function isTelephoneFR(psChaine) {
    let motif = /^0[1-9](-[0-9]{2}){4}$/;
    return motif.test(psChaine);
  }
  
  function isEntier(psChaine) {
    let motif = /^[-]?[0-9]+$/;
    return motif.test(psChaine);
  }
  
  function isEntierPositif(psChaine) {
    let motif = /^[0-9]+$/;
    return motif.test(psChaine);
  }
  
  function isEntierNegatif(psChaine) {
    let motif = /^-[0-9]+$/;
    return motif.test(psChaine);
  }
  
  function isDecimal(psChaine) {
    let motif = /^[-]?[0-9]*[.]?[0-9]+$/;
    return motif.test(psChaine);
  }
  
  function isDecimalFR(psChaine) {
    let motif = /^[-]?[0-9]*[,]?[0-9]+$/;
    return motif.test(psChaine);
  }
  
  function isNomSansAccent(psChaine) {
    let motif = /^[A-Z][A-Za-z '-]+$/;
    return motif.test(psChaine);
  }
  
  function isNomAvecAccent(psChaine) {
    let motif = /^[A-Z][A-Za-zàâäéèêëîïôöüûù '-]+$/;
    return motif.test(psChaine);
  }
  
  function isSnakeCase(psChaine) {
    let motif = /^[a-z]+_?[a-z]+$/;
    return motif.test(psChaine);
  }
  
  function isCamelCase(psChaine) {
    let motif = /^[a-z]+(?:[A-Z][a-z]+)*$/;
    return motif.test(psChaine);
  }
  
  function isKebabCase(psChaine) {
    let motif = /^[a-z]+(?:-[a-z]+)*$/;
    return motif.test(psChaine);
  }
  
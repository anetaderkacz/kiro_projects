function panel_f()
{

if(document.frmn.tf.value==""){document.getElementById("paneltresc").style.display="";}
if(document.frmn.tf.value!=""){document.getElementById("paneltresc").style.display="none";}

}


function sprn(frm)
{
  if(document.frmn.nazwa.value=="")
  {
    alert("Podaj nazwa!");
    return false;
  }
}

function sprt(frm)
{
  if(document.frmt.tytul.value=="")
  {
    alert("Podaj tytul!");
    return false;
  }
}

function potwierdz()
{
  if (confirm("Czy na pewno chesz skasowaæ?")==false)
  return false;
}



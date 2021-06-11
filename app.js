function getInputValue(){
  // Selecting the input element and get its value 
  let  oddsinputVal = document.getElementById("odds").value;
  let  stakeinputVal = document.getElementById("stake").value;

  let profitvalue = 0.00;
  // get values from elements in the form
  let  resultelement = document.getElementById("result");
  let  resultvalue = resultelement.options[resultelement.selectedIndex].text;
  let oddsvalue = parseFloat(oddsinputVal);
  let stakevalue = parseFloat(stakeinputVal);
  
  // Calculate Profit/Loss

  if(resultvalue === "Win"){
    profitvalue = (oddsvalue * stakevalue) - stakevalue;
    document.getElementById("pnl").value = profitvalue;
  }
  else if(resultvalue === "Lose")
  {
    profitvalue = -(stakevalue);
    document.getElementById("pnl").value = profitvalue;
  }
  else if(resultvalue === "Cashout stake")
  {
    profitvalue = stakevalue;
    document.getElementById("pnl").value = profitvalue;
  }
  else if(resultvalue === "Cashout half Stake")
  {
    profitvalue = -(stakevalue /2);
    document.getElementById("pnl").value = profitvalue;
  }
  else if(resultvalue === "Cashout 2X stake")
  {
    profitvalue = (stakevalue *2);
    document.getElementById("pnl").value = profitvalue;;
  }
  else if(resultvalue === "Cashout 80% Return")
  {
    profitvalue = ((oddsvalue * stakevalue )- stakevalue)*0.80;
    document.getElementById("pnl").value = profitvalue;
  }



  
}
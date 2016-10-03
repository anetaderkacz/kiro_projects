package com.example.przelicznikwalut;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Spinner;
import android.widget.TextView;

public class MainActivity extends Activity  {
	
	TextView wynik;
	Spinner waluta_we;
	Spinner waluta_wy;
	TextView wartosc;
	Double pln_eur = 4.46;
	Double pln_usd = 4.14;
	Double pln_gbp = 5.9;
	Double pln_rub = 0.053;
	
	Double eur_usd = 1.08;
	Double eur_gbp = 0.76;
	Double eur_rub = 86.84;//1 euro to tyle rubli
	
	Double usd_gbp = 0.7;
	Double usd_rub = 78.15;
	
	Double gbp_rub = 111.5;

	
	

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		
		wynik=(TextView)findViewById(R.id.wynik);
		waluta_we = (Spinner)findViewById(R.id.waluta_we);
		waluta_wy = (Spinner)findViewById(R.id.waluta_wy);
		wartosc = (TextView)findViewById(R.id.wartosc);
		
		
		
		
	}
	
	 
	public void przelicz (View view){
		
		String we = String.valueOf(waluta_we.getSelectedItem());
		String wy = String.valueOf(waluta_wy.getSelectedItem());
		
		
		if(we==wy){
			wynik.setText("Przeliczanie z tej samej waluty");
		}
		

		
		
		if ((we.contentEquals("PLN"))&&(wy.contentEquals("EUR"))){
			Double wartosc1;
			Double wartosc2;
			wartosc2=Double.parseDouble(""+wartosc.getText());
			wartosc1=wartosc2/pln_eur;
			
			
			wynik.setText(wartosc1.toString()+" "+waluta_wy.getSelectedItem().toString());
			
			
		}
		
		if ((we.contentEquals("PLN"))&&(wy.contentEquals("USD"))){
			Double wartosc1;
			Double wartosc2;
			wartosc2=Double.parseDouble(""+wartosc.getText());
			wartosc1=wartosc2/pln_usd;
			
			wynik.setText(wartosc1.toString()+" "+waluta_wy.getSelectedItem().toString());
			
		}
		if ((we.contentEquals("PLN"))&&(wy.contentEquals("GBP"))){
			Double wartosc1;
			Double wartosc2;
			wartosc2=Double.parseDouble(""+wartosc.getText());
			wartosc1=wartosc2/pln_gbp;
			
			wynik.setText(wartosc1.toString()+" "+waluta_wy.getSelectedItem().toString());
		}
		
		if ((we.contentEquals("PLN"))&&(wy.contentEquals("RUB"))){
			Double wartosc1;
			Double wartosc2;
			wartosc2=Double.parseDouble(""+wartosc.getText());
			wartosc1=wartosc2*pln_rub;
			
			wynik.setText(wartosc1.toString()+" "+waluta_wy.getSelectedItem().toString());
		
		
	}
		
		if ((we.contentEquals("EUR"))&&(wy.contentEquals("PLN"))){
			Double wartosc1;
			Double wartosc2;
			wartosc2=Double.parseDouble(""+wartosc.getText());
			wartosc1=wartosc2*pln_eur;
			
			wynik.setText(wartosc1.toString()+" "+waluta_wy.getSelectedItem().toString());
			
			
		}
		if ((we.contentEquals("EUR"))&&(wy.contentEquals("USD"))){
			Double wartosc1;
			Double wartosc2;
			wartosc2=Double.parseDouble(""+wartosc.getText());
			wartosc1=wartosc2*eur_usd;
			
			wynik.setText(wartosc1.toString()+" "+waluta_wy.getSelectedItem().toString());
			
			
		}
		if ((we.contentEquals("EUR"))&&(wy.contentEquals("GBP"))){
			Double wartosc1;
			Double wartosc2;
			wartosc2=Double.parseDouble(""+wartosc.getText());
			wartosc1=wartosc2*eur_gbp;
			
			wynik.setText(wartosc1.toString()+" "+waluta_wy.getSelectedItem().toString());
			
			
		}
		
		if ((we.contentEquals("EUR"))&&(wy.contentEquals("RUB"))){
			Double wartosc1;
			Double wartosc2;
			wartosc2=Double.parseDouble(""+wartosc.getText());
			wartosc1=wartosc2*eur_rub;
			
			wynik.setText(wartosc1.toString()+" "+waluta_wy.getSelectedItem().toString());
			
			
		}
		
		if ((we.contentEquals("USD"))&&(wy.contentEquals("EUR"))){
			Double wartosc1;
			Double wartosc2;
			wartosc2=Double.parseDouble(""+wartosc.getText());
			wartosc1=wartosc2/eur_usd;
			
			wynik.setText(wartosc1.toString()+" "+waluta_wy.getSelectedItem().toString());
			
			
		}
		if ((we.contentEquals("USD"))&&(wy.contentEquals("PLN"))){
			Double wartosc1;
			Double wartosc2;
			wartosc2=Double.parseDouble(""+wartosc.getText());
			wartosc1=wartosc2*pln_usd;
			
			wynik.setText(wartosc1.toString()+" "+waluta_wy.getSelectedItem().toString());
			
			
		}
		if ((we.contentEquals("USD"))&&(wy.contentEquals("GBP"))){
			Double wartosc1;
			Double wartosc2;
			wartosc2=Double.parseDouble(""+wartosc.getText());
			wartosc1=wartosc2*usd_gbp;
			
			wynik.setText(wartosc1.toString()+" "+waluta_wy.getSelectedItem().toString());
			
			
		}
		if ((we.contentEquals("USD"))&&(wy.contentEquals("RUB"))){
			Double wartosc1;
			Double wartosc2;
			wartosc2=Double.parseDouble(""+wartosc.getText());
			wartosc1=wartosc2*usd_rub;
			
			wynik.setText(wartosc1.toString()+" "+waluta_wy.getSelectedItem().toString());
			
			
		}
		if ((we.contentEquals("GBP"))&&(wy.contentEquals("RUB"))){
			Double wartosc1;
			Double wartosc2;
			wartosc2=Double.parseDouble(""+wartosc.getText());
			wartosc1=wartosc2*gbp_rub;
			
			wynik.setText(wartosc1.toString()+" "+waluta_wy.getSelectedItem().toString());
			
			
		}
		if ((we.contentEquals("GBP"))&&(wy.contentEquals("PLN"))){
			Double wartosc1;
			Double wartosc2;
			wartosc2=Double.parseDouble(""+wartosc.getText());
			wartosc1=wartosc2*pln_gbp;
			
			wynik.setText(wartosc1.toString()+" "+waluta_wy.getSelectedItem().toString());
		}
		if ((we.contentEquals("GBP"))&&(wy.contentEquals("EUR"))){
			Double wartosc1;
			Double wartosc2;
			wartosc2=Double.parseDouble(""+wartosc.getText());
			wartosc1=wartosc2/eur_gbp;
			
			wynik.setText(wartosc1.toString()+" "+waluta_wy.getSelectedItem().toString());
			
			
		}
		if ((we.contentEquals("GBP"))&&(wy.contentEquals("USD"))){
			Double wartosc1;
			Double wartosc2;
			wartosc2=Double.parseDouble(""+wartosc.getText());
			wartosc1=wartosc2/usd_gbp;
			
			wynik.setText(wartosc1.toString()+" "+waluta_wy.getSelectedItem().toString());
			
			
		}
		if ((we.contentEquals("RUB"))&&(wy.contentEquals("PLN"))){
			Double wartosc1;
			Double wartosc2;
			wartosc2=Double.parseDouble(""+wartosc.getText());
			wartosc1=wartosc2/pln_rub;
			
			wynik.setText(wartosc1.toString()+" "+waluta_wy.getSelectedItem().toString());
		
		
	}
		if ((we.contentEquals("RUB"))&&(wy.contentEquals("GBP"))){
			Double wartosc1;
			Double wartosc2;
			wartosc2=Double.parseDouble(""+wartosc.getText());
			wartosc1=wartosc2/gbp_rub;
			
			wynik.setText(wartosc1.toString()+" "+waluta_wy.getSelectedItem().toString());
			
			
		}
		
		if ((we.contentEquals("RUB"))&&(wy.contentEquals("EUR"))){
			Double wartosc1;
			Double wartosc2;
			wartosc2=Double.parseDouble(""+wartosc.getText());
			wartosc1=wartosc2/eur_rub;
			
			wynik.setText(wartosc1.toString()+" "+waluta_wy.getSelectedItem().toString());
			
			
		}
		if ((we.contentEquals("RUB"))&&(wy.contentEquals("USD"))){
			Double wartosc1;
			Double wartosc2;
			wartosc2=Double.parseDouble(""+wartosc.getText());
			wartosc1=wartosc2/usd_rub;
			
			wynik.setText(wartosc1.toString()+" "+waluta_wy.getSelectedItem().toString());
			
			
		}
		

		Bundle bundle1 = getIntent().getExtras();
		pln_eur = Double.parseDouble(bundle1.getString("pln_eur1"));
		
		
	}

			

	public void zmien(View view) {
		Intent intencja = new Intent(getBaseContext(), ZmienActivity.class);
		intencja.putExtra("pln_eur", pln_eur);
		intencja.putExtra("pln_usd", pln_usd);
		intencja.putExtra("pln_gbp", pln_gbp);
		intencja.putExtra("pln_rub", pln_rub);
		intencja.putExtra("eur_usd", eur_usd);
		intencja.putExtra("eur_gbp", eur_gbp);
		intencja.putExtra("eur_rub", eur_rub);
		intencja.putExtra("usd_gbp", usd_gbp);
		intencja.putExtra("usd_rub", usd_rub);
		intencja.putExtra("gbp_rub", gbp_rub);

		startActivity(intencja);
	}
		
	

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}

	
	@Override
	public boolean onOptionsItemSelected(MenuItem item) {

		switch (item.getItemId()) {

		case R.id.pomoc:
			wybrano("Pomoc");
			return true;
		case R.id.autor:
			wybrano("O autorze");
			return true;
		default:
			return super.onOptionsItemSelected(item);
		}
	}

	public void wybrano(String napis){
		 wynik.setText(napis.toString());}
		 
	

	
	

	
	
}
	



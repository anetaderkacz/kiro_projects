package com.example.przelicznikwalut;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.TextView;

public class ZmienActivity extends Activity {
	
	TextView pln_eur1;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_zmien);
		
		pln_eur1=(TextView)findViewById(R.id.pe);
		
		Bundle bundle = getIntent().getExtras();
		Double pln_eur = bundle.getDouble("pln_eur");
		
		pln_eur1.setText(pln_eur.toString());
		
		
	}
	public void zmien1(View view){
		Intent intencja1= new Intent (getBaseContext(), MainActivity.class);
		intencja1.putExtra("pln_eur1", pln_eur1.getText().toString());
		
		startActivity(intencja1);
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.zmien, menu);
		return true;
	}

	@Override
	public boolean onOptionsItemSelected(MenuItem item) {
		// Handle action bar item clicks here. The action bar will
		// automatically handle clicks on the Home/Up button, so long
		// as you specify a parent activity in AndroidManifest.xml.
		int id = item.getItemId();
		if (id == R.id.action_settings) {
			return true;
		}
		return super.onOptionsItemSelected(item);
	}
}

package com.example.pranav.derbymananger;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import org.apache.http.util.EntityUtils;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import android.view.View.OnClickListener;


import java.io.IOException;
import java.io.UnsupportedEncodingException;
import java.util.ArrayList;
import java.util.List;


public class login extends Activity {

    Button signin;
    EditText loginemail;
    EditText loginpassword;
    static boolean logged_in = false;
    static String email,password ;
    SharedPreferences prefs;
    public static final String TAG ="LOGIN";
    Context context;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        context = getApplicationContext();
        prefs = getSharedPreferences(login.class.getName(), Context.MODE_PRIVATE);
        loginemail = (EditText) findViewById(R.id.email);
        loginpassword = (EditText) findViewById(R.id.password);
        signin = (Button)findViewById(R.id.signin);

        getSharedPreferences();

        Intent i = getIntent();
        if(i.getBooleanExtra("logout",false)) {
            //The user was just logged out
            //clear shared preferences login
            logged_in = false;
            //Provide the username hint based on previot
        }

        if(logged_in)
        {
            /*
            Insert code to skip login and redirect the user to the next page.
            Call intent to redirect the user.
             */
            redirect_user();
        }


        signin.setOnClickListener(new OnClickListener() {

            @Override
            public void onClick(View arg0) {

            //Ensure that the user has entered email and password in the necessary format
            email = loginemail.getText().toString();
            password = loginpassword.getText().toString();
            Log.i(TAG,"Email : "+email+", Password : "+password);
            authorize();
            }
        });

    }

    public void validate(boolean flag)
    {
        if(flag==true){
        /*  Verify login by sending parameters to the php script and determining if the entered details are valid
                    If valid, we save it in shared preferences and redirect the user to the main activity.
                    */
        logged_in = true;
        redirect_user();
    }
    else
    {
        //inform the user of invalid login attempt
        Toast.makeText(context,"Invalid email or password.\nPlease try again.",Toast.LENGTH_SHORT).show();
    }
   }

    public void authorize() {

        if (isNetworkAvailable()) {
            class myTask extends AsyncTask<Void,Void,Void> {

                boolean flag = false;
                @Override
                protected Void doInBackground(Void... params) {
                    try {

                        HttpClient httpclient = new DefaultHttpClient();
                        HttpPost httppost = new HttpPost("http://192.168.43.81/se-derby/Forms/authorize.php"); //change localhost ipaddress accordingly
                        List<NameValuePair> nameValuePairs = new ArrayList<NameValuePair>(2);
                        nameValuePairs.add(new BasicNameValuePair("email", email));
                        nameValuePairs.add(new BasicNameValuePair("pwd", password));
                        nameValuePairs.add(new BasicNameValuePair("client", "android"));
                        httppost.setEntity(new UrlEncodedFormEntity(nameValuePairs));
                        HttpResponse response = httpclient.execute(httppost);
                        String responseStr = EntityUtils.toString(response.getEntity());
                        JSONObject obj = new JSONObject(responseStr);
                        Boolean res = obj.getBoolean("success");
                        Log.i(TAG,"Server Response for Login: "+res);
                        Log.i(TAG,((Object)res).getClass().getName());
                        if(res){
                            //Sucessfully logged in
                            Log.i(TAG,"Valid Login credentials");
                            flag=true;
                        }
                    } catch (UnsupportedEncodingException e) {
                        e.printStackTrace();
                    } catch (ClientProtocolException e) {
                        e.printStackTrace();
                    } catch (IOException e) {
                        e.printStackTrace();
                    } catch (JSONException e) {
                        e.printStackTrace();
                    }
                    return null;
                }

                @Override
                protected void onPostExecute(Void result){
                    Log.i(TAG,"Flag value :"+flag);
                    validate(flag);
                }
            }
            myTask task = (myTask) new myTask().execute();
        }




    }

    public void redirect_user()
    {
        setSharedPreferences();
        Intent intent = new Intent(getApplicationContext(),MainActivity.class);
        intent.putExtra("email",email);
        startActivity(intent);
    }


    public void getSharedPreferences()
    {
        if(prefs.contains("login"))
            logged_in = prefs.getBoolean("login",false);
        if(prefs.contains("email"))
            email = prefs.getString("email","");
    }

    public void setSharedPreferences()
    {
        SharedPreferences.Editor editor = prefs.edit();
        editor.putBoolean("login",logged_in);
        editor.putString("email",email);
        editor.commit();
    }

    public boolean isNetworkAvailable()
        {
        boolean haveConnectedWifi = false;
        boolean haveConnectedMobile = false;

        ConnectivityManager cm = (ConnectivityManager) getSystemService(Context.CONNECTIVITY_SERVICE);
        NetworkInfo[] netInfo = cm.getAllNetworkInfo();
        for (NetworkInfo ni : netInfo) {
        if (ni.getTypeName().equalsIgnoreCase("WIFI"))
        if (ni.isConnected())
        haveConnectedWifi = true;
        if (ni.getTypeName().equalsIgnoreCase("MOBILE"))
        if (ni.isConnected())
        haveConnectedMobile = true;
        }
        return haveConnectedWifi || haveConnectedMobile;
        }

    @Override
    public void onDestroy()
    {
        setSharedPreferences();
        super.onDestroy();
    }

    @Override
    public void onBackPressed()
    {
        setSharedPreferences();
        super.onBackPressed();
    }

    @Override
    public void onPause()
    {
        setSharedPreferences();
        super.onPause();
    }

    @Override
    public void onResume()
    {
        super.onResume();
        setSharedPreferences();
        if(logged_in)
            redirect_user();

    }


}


package com.example.pranav.derbymananger;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import android.view.View.OnClickListener;


import java.io.IOException;
import java.util.ArrayList;
import java.util.List;


public class login extends Activity {
    public String Email;
    public String password;
    Button signin;
    EditText loginemail;
    EditText loginpassword;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        loginemail = (EditText) findViewById(R.id.email);
        loginpassword = (EditText) findViewById(R.id.password);
        signin = (Button)findViewById(R.id.signin);
        signin.setOnClickListener(new OnClickListener() {

            @Override
            public void onClick(View arg0) {
                // TODO Auto-generated method stub
               Intent intent = new Intent(getApplicationContext(),MainActivity.class);
                startActivity(intent);
            }
        });

    }

    public void send()
    {
        // get the message from the message text box
        Email = loginemail.getText().toString();
        password = loginpassword.getText().toString();
        // make sure the fields are not empty
        System.out.print(Email);
        System.out.print(password);
        if (Email.length()>0 && password.length()>0)
        {   System.out.println("FIRST");
            HttpClient httpclient = new DefaultHttpClient();
            HttpPost httppost = new HttpPost("http://192.168.179.1/se-derby-master/Forms/authorize.php");
            try {
                System.out.println("SECOND");
                List<NameValuePair> nameValuePairs = new ArrayList<NameValuePair>(2);
                nameValuePairs.add(new BasicNameValuePair("email", Email));
                nameValuePairs.add(new BasicNameValuePair("pwd", password));
                httppost.setEntity(new UrlEncodedFormEntity(nameValuePairs));
                System.out.println("HTTP POST1");
                HttpResponse response = httpclient.execute(httppost);
                System.out.println("HTTP POST2");
                loginemail.setText("");  // clear text box
            } catch (ClientProtocolException e) {
                // TODO Auto-generated catch block
            } catch (IOException e) {
                // TODO Auto-generated catch block
            }

        }
        else
        {
            // display message if text fields are empty
            Toast.makeText(getBaseContext(), "All field are required", Toast.LENGTH_SHORT).show();
        }

    }


}


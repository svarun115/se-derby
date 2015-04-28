package com.example.pranav.derbymananger;

import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.webkit.WebView;
import android.webkit.WebViewClient;


public class betting extends ActionBarActivity {
    private Toolbar toolbar;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.betting);
        toolbar = (Toolbar)findViewById(R.id.app_bar);
        setSupportActionBar(toolbar);
        getSupportActionBar().setDisplayShowHomeEnabled(true);


       NavigationDrawerFragment drawerFragment = (NavigationDrawerFragment)
                getSupportFragmentManager().findFragmentById(R.id.fragment_navigation_drawer);
        drawerFragment.setUp((DrawerLayout)findViewById(R.id.drawer_layout), toolbar);

        WebView webview = (WebView)findViewById(R.id.webView1);
        webview.getSettings().setLoadsImagesAutomatically(true);
        webview.getSettings().setJavaScriptEnabled(true);
        webview.setScrollBarStyle(View.SCROLLBARS_INSIDE_INSET);
        webview.setWebViewClient(new MyWebViewClient());

        //webview.setBackgroundColor();
        webview.loadUrl("http://192.168.43.81/se-derby/Forms/Form_betting_An.php");

    }
    public class MyWebViewClient extends WebViewClient {

        public boolean shouldOverrirdeUrlLoading(WebView view,String url){
            view.loadUrl(url);

            return false;
        }
    }

}

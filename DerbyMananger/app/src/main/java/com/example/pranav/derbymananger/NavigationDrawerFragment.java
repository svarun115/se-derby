package com.example.pranav.derbymananger;


import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.support.v7.widget.Toolbar;
import android.widget.Adapter;

import java.util.ArrayList;
import java.util.List;


/**
 * A simple {@link Fragment} subclass.
 */
public class NavigationDrawerFragment extends Fragment {

    private ActionBarDrawerToggle mDrawerToggle;
    private DrawerLayout mDrawerLayout;
    private RecyclerView recyclerView;
    private AdapterVivz adapter;
    public NavigationDrawerFragment() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View layout = inflater.inflate(R.layout.fragment_navigation_drawer, container, false);
        recyclerView= (RecyclerView) layout.findViewById(R.id.drawerList);
        adapter=new AdapterVivz(getActivity(),getData());
        recyclerView.setAdapter(adapter);
        recyclerView.setLayoutManager(new LinearLayoutManager(getActivity()));
        return layout;


    }
    public static List<Information> getData() {
        List<Information> data = new ArrayList<>();
        int [] icons = {R.drawable.ic_race,R.drawable.ic_pay,R.drawable.ic_aboutus,R.drawable.settings};
        String[] titles = {"Home","Betting","About us","Log Out"};
        for(int i =0; i<titles.length&&i<icons.length;i++){
            Information current = new Information();
            current.iconId=icons[i];
            current.title=titles[i];
            data.add(current);
        }
        return data;
    }


    public void setUp(DrawerLayout drawerLayout, final Toolbar toolbar) {
        mDrawerLayout = drawerLayout;
        mDrawerToggle=new ActionBarDrawerToggle(getActivity(),drawerLayout,toolbar,R.string.drawer_open,R.string.drawer_close){

            @Override
            public void onDrawerOpened(View drawerView) {
                super.onDrawerOpened(drawerView);
                getActivity().invalidateOptionsMenu();

            }

            @Override
            public void onDrawerClosed(View drawerView) {
                super.onDrawerClosed(drawerView);
                getActivity().invalidateOptionsMenu();
            }

           // @Override
          /*  public void onDrawerSlide(View drawerView, float slideOffset) {
                if(slideOffset<0.6){
                    toolbar.setAlpha(1-slideOffset);
                }
            }*/
        };
            mDrawerLayout.setDrawerListener(mDrawerToggle);
            mDrawerLayout.post(new Runnable() {
                @Override
                public void run() {
                mDrawerToggle.syncState();
                }
            });
    }
}

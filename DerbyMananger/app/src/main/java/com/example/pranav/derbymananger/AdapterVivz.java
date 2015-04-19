package com.example.pranav.derbymananger;
import android.app.Fragment;
import android.app.FragmentManager;
import android.app.FragmentTransaction;
import android.content.Context;
import android.content.Intent;
import android.support.v4.app.FragmentActivity;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.example.pranav.derbymananger.Information;
import com.example.pranav.derbymananger.R;

import java.util.Collections;
import java.util.List;



public class AdapterVivz extends RecyclerView.Adapter<AdapterVivz.MyViewHolder> {
    List<Information> data= Collections.emptyList();
    private LayoutInflater inflater;
    private Context context;
    public AdapterVivz(Context context, List<Information> data){
        this.context=context;
        inflater=LayoutInflater.from(context);
        this.data=data;
    }

    public void delete(int position){
        data.remove(position);
        notifyItemRemoved(position);
    }
    @Override
    public MyViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View view=inflater.inflate(R.layout.custom_row, parent,false);
        MyViewHolder holder=new MyViewHolder(view);
        return holder;
    }

    @Override
    public void onBindViewHolder(MyViewHolder holder, int position) {
        Information current=data.get(position);
        holder.title.setText(current.title);
        holder.icon.setImageResource(current.iconId);

    }
    @Override
    public int getItemCount() {
        return data.size();
    }

    class MyViewHolder extends RecyclerView.ViewHolder implements View.OnClickListener{
        TextView title;
        ImageView icon;
        public MyViewHolder(View itemView) {
            super(itemView);
            title= (TextView) itemView.findViewById(R.id.listText);
            icon= (ImageView) itemView.findViewById(R.id.listIcon);
            icon.setOnClickListener(this);
            title.setOnClickListener(this);
        }

        @Override
        public void onClick(View v) {

            switch (getAdapterPosition()) {

                case 0:
                    Intent intent = new Intent(context,MainActivity.class);
                    context.startActivity(intent);
                    break;
                case 1:
                    Intent intent2 = new Intent(context,betting.class);
                    context.startActivity(intent2);
                    break;
                case 2:
                    Intent intent3 = new Intent(context,aboutus.class);
                    context.startActivity(intent3);
                    break;
                case 3:
                    Intent intent4 = new Intent(context,login.class);
                    intent4.putExtra("logout",true);
                    context.startActivity(intent4);
                    break;
            }
        }



    }
}
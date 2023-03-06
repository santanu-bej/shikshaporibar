#include<iostream>
using namespace std;
#include<vector>
    // int captureForts(vector<int>& forts) {
    //     int i=0;
    //     vector<int> ss;
    //     for(int i=0;i<forts.size();i++){
    //         if(forts[i]==1 || forts[i]==-1){
    //             ss.push_back(i);
    //         }
    //     }
    //     int res = 0;
    //     for(int i=0;i<=ss.size()-2;i++){
    //         if(forts[ss[i]]!=-1 && forts[ss[i+1]]!=1){
    //             res = max(res,abs(ss[i]-ss[i+1])-1);
    //         }
    //         else if(forts[ss[i]]!=1 && forts[ss[i+1]]!=-1){
    //             res = max(res,abs(ss[i]-ss[i+1])-1);
    //         }
    //     }
    //     return res;
    // }
    int captureForts(vector<int>& forts) {
        int p=-1;
        int res = 0;
        for(int i=0;i<forts.size();i++)
        {
            if(forts[i]==1 || forts[i]==-1){
                int c = i;
                if(p!=-1){
                    if((forts[p]==1 && forts[c]==-1)||(forts[p]==-1 && forts[c]==1)){
                        cout<<p<<" "<<c<<"\n";
                        int cp = c-p-1;
                        p = c;
                        if(res<cp){
                            res = cp;
                        }
                    }else{
                        p = c;
                    }
                }else{
                    p = c;
                }
            }
        }        
        return res;
    }
int main(){
    // vector<int> in{1,0,0,-1};
    vector<int> in{0,0,1,-1};
    // vector<int> in{-1,-1,0,1,0,0,1,-1,1,0};
    // vector<int> in{1,0,0,-1,0,0,0,0,1};
    int res = captureForts(in);
    cout<<res;
    return 0;
}
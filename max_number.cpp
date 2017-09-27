#include <iostream>

using namespace std;

int main(){
    string str;
    cin>>str;
    int n = str.length();
    int max=-1, x=0;
    for(int i=0; i<n; i++){
        if(str[i]>='0' && str[i]<='9'){
            x = x*10+str[i]-'0';
        }else{
            if(x>max){
                max = x;
                x = 0;
            }
        }
    }
    if(x>max){
        max = x;
    }
    cout<<max<<endl;
}
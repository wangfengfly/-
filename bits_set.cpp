/*
 * 给定一个正整数n， 判断是不是所有的位都是1
 *
 */
#include <iostream>

using namespace std;

string allones(int n){
    if(n == 0){
        return "NO";
    }
    if(((n+1)&n) == 0){
        return "Yes";
    }
    return "NO";
}

string allones2(int n){
    if(n == 0){
        return "NO";
    }
    while(n>0){
        if((n&1) == 0){
            return "NO";
        }
        n = n>>1;
    }
    return "Yes";
}


int main(){
    int n;
    cin>>n;
    cout<<allones(n)<<endl;
    cout<<allones2(n)<<endl;
}
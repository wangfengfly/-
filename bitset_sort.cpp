/**
大数据量的数组，已知最大值，位图排序。
*/
#include <iostream>
#include <bitset>

using namespace std;

int main(){
    int data[] = {1,10,100,56,3,9,7,1000};
    int n = sizeof(data)/sizeof(int);
    
    bitset<1001> bs;
    for(int i=0; i<n; i++){
        bs.set(data[i], 1);
    }
    
    n = bs.size();
    for(int i=0; i<n; i++){
        if(bs[i]){
            cout<<i<<" ";
        }
    }
    cout<<endl;
}
#include <iostream>
#include <vector>

using namespace std;

int min(int a, int b){
    return a < b ? a : b;
}

int rooti(int i){
    if(i % 2){
        return i / 2;
    }else{
        return i / 2 - 1;
    }
}

/*
build min heap 
*/
void build(vector<int> &vec, int i){
    int root = rooti(i);
    while(root >= 0){
        if(vec[root] > vec[i]){
            int temp = vec[root];
            vec[root] = vec[i];
            vec[i] = temp;
            i = root;
            root = rooti(i);
        }else{
            return;
        }
    }
}

/*
从最小堆中删除元素以后，调整堆
*/
void justify(vector<int> &vec){
    int size = vec.size();
    int i = 0;
    int l = 2 * i + 1, r = 2 * i + 2;
    int mini, minv;
    while(l < size && r < size){
        if(vec[l] < vec[r]){
            minv = vec[l];
            mini = l;
        }else{
            minv = vec[r];
            mini = r;
        }
        if(minv < vec[i]){
            vec[mini] = vec[i];
            vec[i] = minv;
            i = mini;
            l = 2 * i + 1;
            r = l + 1;
        }else{
            return;
        }
    }
    if(l < size){
        if(vec[l] < vec[i]){
            int temp = vec[l];
            vec[l] = vec[i];
            vec[i] = temp;
          
        }
    }
}

void output(const vector<int>& vec){
    for(int i = 0; i < vec.size(); i++){
        cout<<vec[i]<<" ";
    }
    cout<<endl;
}

int main(){
    vector<int> vec;
    int input, i;
    while(cin >> input){
        vec.push_back(input);
        build(vec, vec.size() - 1);
    }   
    
    //打印输出最小堆
    output(vec);
    
    //删除最小元素，并调整堆
    if(vec.size() > 0){
        cout<<vec[0]<<endl;
        vec[0] = vec[vec.size() - 1];
        vec.erase(vec.begin() + vec.size() - 1);
        justify(vec);
        output(vec);
    }
   
    
    
}
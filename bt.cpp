#include <iostream>
#include <string>
#include <vector>
#include <cstring>
#include <queue>
#include <cstdlib>

using namespace std;

struct Node{
    int val;
    Node* left;
    Node* right;
    Node(int x): val(x), left(NULL), right(NULL){}
};

void sumRec(Node *root, int sum, vector<int> &subres, vector<vector<int> > &res){
    if(root->left == NULL && root->right == NULL && root->val == sum){
        res.push_back(subres);
        return;
    }
    if(root->left){
        subres.push_back(root->left->val);
        sumRec(root->left, sum - root->val, subres, res);
        subres.pop_back();
    }
    if(root->right){
        subres.push_back(root->right->val);
        sumRec(root->right, sum - root->val, subres, res);
        subres.pop_back();
    }
}


vector<vector<int> > pSum(Node* root, int sum){
    vector<vector<int> > res;
    if(root == NULL)
        return res;
    vector<int> subres;
    subres.push_back(root->val);    
    sumRec(root, sum, subres, res);
    return res;
}

vector<int> getData(string vals){
    vector<int> data;
    char* cstr = new char[vals.length() + 1];
    strcpy(cstr, vals.c_str());
    const char* p = strtok(cstr, ",");
    while(p != NULL){
          data.push_back(atoi(p));
          p = strtok(NULL, ",");    
    }
 
    delete[] cstr;
    return data;
}

Node* buildTree(vector<int> data){
    int i = 0;
    Node* root = new Node(data[i]);
    queue<Node*> q;
    q.push(root);
    while(!q.empty()){
        Node* t = q.front();
        q.pop();
        
        if(2*i+1 >= data.size())
            break;
        t->left = new Node(data[2*i+1]);        
        q.push(t->left);
        
        if(2*i+2 >= data.size())
            break;
        t->right = new Node(data[2*i+2]);         
        q.push(t->right);
        i++;
    }
    return root;
}

void printTree(Node* root){
    if(root != NULL){
        queue<Node*> q;
        q.push(root);
        while(!q.empty()){
            Node* t = q.front();
            q.pop();
            if(t != NULL){                           
                cout<<t->val<<",";
                q.push(t->left);
                q.push(t->right);
            }        
        }
    }
    cout<<endl;
}

int main()
{
  int sum;
  cin>>sum;
  string vals;
  cin>>vals;
  vector<int> data = getData(vals);
  
  if(data.size() > 0){
      Node* root = buildTree(data);    
      //printTree(root);
      
      vector<vector<int> > res = pSum(root, sum);
      if(res.size() > 0){
          for(int i = 0; i < res.size(); i++){
              for(int j = 0; j < res[i].size(); j++){
                  cout<<res[i][j]<<",";
              }
              cout<<endl;
          }
      }else{
          cout<<"error"<<endl;
      }
  }
  
  return 0;
}

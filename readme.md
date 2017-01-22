<h3>Cube Summation</h3>

You are given a 3-D Matrix in which each block contains 0 initially. The first block is defined by the coordinate (1,1,1) and the last block is defined by the coordinate (N,N,N). There are two types of queries. </br>

UPDATE x y z W </br>
updates the value of block (x,y,z) to W. </br>

QUERY x1 y1 z1 x2 y2 z2 </br>
calculates the sum of the value of blocks whose x coordinate is between x1 and x2 (inclusive), y coordinate between y1 and y2 (inclusive) and z coordinate between z1 and z2 (inclusive). </br>

Input Format </br>
The first line contains an integer T, the number of test-cases. T testcases follow. </br>
For each test case, the first line will contain two integers N and M separated by a single space. </br>
N defines the N * N * N matrix. </br>
M defines the number of operations. </br>
The next M lines will contain either</br>

 1. UPDATE x y z W</br>
 2. QUERY  x1 y1 z1 x2 y2 z2 </br>
Output Format </br>
Print the result for each QUERY.</br>

Constrains </br>
1 <= T <= 50 </br>
1 <= N <= 100 </br>
1 <= M <= 1000 </br>
1 <= x1 <= x2 <= N </br>
1 <= y1 <= y2 <= N </br>
1 <= z1 <= z2 <= N </br>
1 <= x,y,z <= N </br>
-109 <= W <= 109</br>

Sample Input</br>

2</br>
4 5</br>
UPDATE 2 2 2 4</br>
QUERY 1 1 1 3 3 3</br>
UPDATE 1 1 1 23</br>
QUERY 2 2 2 4 4 4</br>
QUERY 1 1 1 3 3 3</br>
2 4</br>
UPDATE 2 2 2 1</br>
QUERY 1 1 1 1 1 1</br>
QUERY 1 1 1 2 2 2</br>
QUERY 2 2 2 2 2 2</br>
Sample Output</br>

4</br>
4</br>
27</br>
0</br>
1</br>
1</br>
Explanation </br>
First test case, we are given a cube of 4 * 4 * 4 and 5 queries. Initially all the cells (1,1,1) to (4,4,4) are 0. </br>
UPDATE 2 2 2 4 makes the cell (2,2,2) = 4 </br>
QUERY 1 1 1 3 3 3. As (2,2,2) is updated to 4 and the rest are all 0. The answer to this query is 4. </br>
UPDATE 1 1 1 23. updates the cell (1,1,1) to 23. QUERY 2 2 2 4 4 4. Only the cell (1,1,1) and (2,2,2) are non-zero and (1,1,1) is not between (2,2,2) and (4,4,4). So, the answer is 4. </br>
QUERY 1 1 1 3 3 3. 2 cells are non-zero and their sum is 23+4 = 27.</br>

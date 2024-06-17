# %%
import sqlalchemy
import pandas as pd

# %%
from sqlalchemy import create_engine

# %%
engine = create_engine('mysql+mysqlconnector://root:@localhost:3306/sikip_lldikti')

# %%
query = 'SELECT * FROM data_mahasiswa'
df = pd.read_sql(query, engine)
df.head()

# %%
# Fungsi untuk melakukan transformasi kategori gaji
def transformasi_gaji(gaji):
    if gaji == '-':
        return 'Tidak Berpenghasilan'
    elif gaji == 'Tidak Berpenghasilan':
        return 'Tidak Berpenghasilan'
    elif gaji == '< Rp. 250.000':
        return '< Rp 2.000.000'
    elif gaji == 'Rp. 250.001 - Rp. 500.000':
        return '< Rp 2.000.000'
    elif gaji == 'Rp. 500.001 - Rp. 750.000':
        return '< Rp 2.000.000'
    elif gaji == 'Rp. 750.001 - Rp. 1.000.000':
        return '< Rp 2.000.000'
    elif gaji == 'Rp. 1.000.001 - Rp. 1.250.000':
        return '< Rp 2.000.000'
    elif gaji == 'Rp. 1.250.001 - Rp. 1.500.000':
        return '< Rp 2.000.000'
    elif gaji == 'Rp. 1.000.001 - Rp. 1.500.000':
        return '< Rp 2.000.000'
    elif gaji == 'Rp. 1.500.001 - Rp. 1.750.000':
        return '< Rp 2.000.000'
    elif gaji == 'Rp. 1.750.001 - Rp. 2.000.000':
        return '< Rp 2.000.000'
    elif gaji == 'Rp. 2.000.001 - Rp. 2.250.000':
        return 'Rp 2.000.001 - Rp 4.000.000'
    elif gaji == 'Rp. 2.250.001 - Rp. 2.500.000':
        return 'Rp 2.000.001 - Rp 4.000.000'
    elif gaji == 'Rp. 2.500.001 - Rp. 2.750.000':
        return 'Rp 2.000.001 - Rp 4.000.000'
    elif gaji == 'Rp. 2.750.001 - Rp. 3.000.000':
        return 'Rp 2.000.001 - Rp 4.000.000'
    elif gaji == 'Rp. 3.000.001 - Rp. 3.250.000':
        return 'Rp 2.000.001 - Rp 4.000.000'
    elif gaji == 'Rp. 3.250.001 - Rp. 3.500.000':
        return 'Rp 2.000.001 - Rp 4.000.000'
    elif gaji == 'Rp. 3.500.001 - Rp. 3.750.000':
        return 'Rp 2.000.001 - Rp 4.000.000'
    elif gaji == 'Rp. 3.750.001 - Rp. 4.000.000':
        return 'Rp 2.000.001 - Rp 4.000.000'
    elif gaji == 'Rp. 4.000.001 - Rp. 4.250.000':
        return 'Rp 4.000.001 - Rp 6.000.000'
    elif gaji == 'Rp. 4.250.001 - Rp. 4.500.000':
        return 'Rp 4.000.001 - Rp 6.000.000'
    elif gaji == 'Rp. 4.500.001 - Rp. 4.750.000':
        return 'Rp 4.000.001 - Rp 6.000.000'
    elif gaji == 'Rp. 4.750.001 - Rp. 5.000.000':
        return 'Rp 4.000.001 - Rp 6.000.000'
    elif gaji == 'Rp. 5.000.001 - Rp. 5.250.000':
        return 'Rp 4.000.001 - Rp 6.000.000'
    elif gaji == 'Rp. 5.250.001 - Rp. 5.500.000':
        return 'Rp 4.000.001 - Rp 6.000.000'
    elif gaji == 'Rp. 5.500.001 - Rp. 5.750.000':
        return 'Rp 4.000.001 - Rp 6.000.000'
    elif gaji == 'Rp. 5.750.001 - Rp. 6.000.000':
        return 'Rp 4.000.001 - Rp 6.000.000'
    elif gaji == 'Rp. 6.000.001 - Rp. 6.250.000':
        return 'Rp 6.000.001 - Rp 8.000.000'
    elif gaji == 'Rp. 6.250.001 - Rp. 6.500.000':
        return 'Rp 6.000.001 - Rp 8.000.000'
    elif gaji == 'Rp. 6.500.001 - Rp. 6.750.000':
        return 'Rp 6.000.001 - Rp 8.000.000'
    elif gaji == 'Rp. 6.750.001 - Rp. 7.000.000':
        return 'Rp 6.000.001 - Rp 8.000.000'
    elif gaji == 'Rp. 7.000.001 - Rp. 7.250.000':
        return 'Rp 6.000.001 - Rp 8.000.000'
    elif gaji == 'Rp. 7.250.001 - Rp. 7.500.000':
        return 'Rp 6.000.001 - Rp 8.000.000'
    elif gaji == 'Rp. 7.500.001 - Rp. 7.750.000':
        return 'Rp 6.000.001 - Rp 8.000.000'
    elif gaji == 'Rp. 7.750.001 - Rp. 8.000.000':
        return 'Rp 6.000.001 - Rp 8.000.000'
    else:
        return '> Rp 8.000.000'

# Terapkan fungsi transformasi pada kolom 'Gaji_Orang_Tua'
df['Penghasilan_Ayah_Transformed'] = df['penghasilan_ayah'].apply(transformasi_gaji)

df

# %%
df['Penghasilan_Ayah_Transformed'].value_counts()

# %%
num_rows = len(df)
print("Number of rows:", num_rows)

# %%
df['Penghasilan_Ibu_Transformed'] = df['penghasilan_ibu'].apply(transformasi_gaji)

# %%
df['Penghasilan_Ibu_Transformed'].value_counts()

# %%
#fungsi untuk mengubah atribut Status DTKS menjadi data numerik
def dtks_num (dtks):
    if dtks == 'Terdata':
        return 1
    elif dtks == 'Belum Terdata':
        return 0
    
df['Status_DTKS_Labels'] = df['status_dtks'].apply(dtks_num)      

# %%
# Fungsi untuk mengubah atribut penghasilan menjadi data numerik
def penghasilan_num(penghasilan):
    if penghasilan == '> Rp 8.000.000':
        return 1
    elif penghasilan == 'Rp 6.000.001 - Rp 8.000.000':
        return 2
    elif penghasilan == 'Rp 4.000.001 - Rp 6.000.000':
        return 3
    elif penghasilan == 'Rp 2.000.001 - Rp 4.000.000':
        return 4
    elif penghasilan == '< Rp 2.000.000':
        return 5
    elif penghasilan == 'Tidak Berpenghasilan':
        return 6

df['Penghasilan_Ayah_Labels'] = df['Penghasilan_Ayah_Transformed'].apply(penghasilan_num)

# %%
df['Penghasilan_Ibu_Labels'] = df['Penghasilan_Ibu_Transformed'].apply(penghasilan_num)

# %%
def kepemilikan_num(kepemilikan):
    if kepemilikan == '-':
        return 6
    elif kepemilikan == 'Tidak Memiliki':
        return 6
    elif kepemilikan == 'Menumpang Tanpa Ijin':
        return 5
    elif kepemilikan == 'Menumpang':
        return 4
    elif kepemilikan == 'Sewa Bulanan':
        return 3
    elif kepemilikan == 'Sewa Tahunan':
        return 2
    elif kepemilikan == 'Sendiri':
        return 1

df['Kepemilikan_Rumah_Labels'] = df['kepemilikan_rumah'].apply(kepemilikan_num).astype(int)

df['Kepemilikan_Rumah_Labels'].head()

# %%
import re

# Fungsi untuk membersihkan data dan mengubahnya menjadi angka integer
def clean_data(s):
    # Menggunakan ekspresi reguler untuk mencari angka dalam string
    numbers = re.findall(r'-?\d+', s)
    if numbers:
        return int(numbers[0])  # Mengambil angka pertama dalam list dan mengubahnya menjadi integer
    else:
        return None  # Jika tidak ditemukan angka, kembalikan None

# Membersihkan data pada atribut tertentu
df['Jumlah_Tanggungan_Clean'] = df['jumlah_tanggungan'].apply(clean_data)

# Tampilkan hasil setelah pembersihan
df['Jumlah_Tanggungan_Clean'].head()

# %%
df['jumlah_tanggungan'].head()

# %%
def transformasi_tanggungan(tanggungan):
    if tanggungan == 0.0:
        return 'Tidak Memiliki Tanggungan'
    elif tanggungan == 1.0:
        return '< 3 Orang'
    elif tanggungan == 2.0:
        return '< 3 Orang'
    elif tanggungan == 3.0:
        return '3 - 4 Orang'
    elif tanggungan == 4.0:
        return '3 - 4 Orang'
    elif tanggungan == 5.0:
        return '5 - 6 Orang'
    elif tanggungan == 6.0:
        return '5 - 6 Orang'
    else:
        return '> 6 Orang'
    
df['Jumlah_Tanggungan_Transformed'] = df['Jumlah_Tanggungan_Clean'].apply(transformasi_tanggungan)

df['Jumlah_Tanggungan_Transformed'].head()

# %%
def tanggungan_num(orang):
    if orang == '> 6 Orang':
        return 5
    elif orang == '5 - 6 Orang':
        return 4
    elif orang == '3 - 4 Orang':
        return 3
    elif orang == '< 3 Orang':
        return 2
    elif orang == 'Tidak Memiliki Tanggungan':
        return 1
    
df['Jumlah_Tanggungan_Labels'] = df['Jumlah_Tanggungan_Transformed'].apply(tanggungan_num)

# %%
df['Jumlah_Tanggungan_Transformed'].value_counts()

# %%
data_num = df[['Status_DTKS_Labels', 'Penghasilan_Ayah_Labels', 'Penghasilan_Ibu_Labels', 'Jumlah_Tanggungan_Labels', 'Kepemilikan_Rumah_Labels']]

data_num.head(10)

# %%
# Mengurutkan data dari nilai terkecil hingga nilai terbesar untuk setiap kolom
sorted_df = data_num.apply(lambda column: column.sort_values().values)

# Memisahkan data menjadi 2 bagian
half_size = len(sorted_df) // 2
first_half = sorted_df.iloc[:half_size]
second_half = sorted_df.iloc[half_size:]

# Menghitung nilai tengah dari masing-masing bagian sebagai titik centroid awal
centroid_1 = first_half.median()
centroid_2 = second_half.median()

print("Titik Centroid Awal untuk Cluster 1:")
print(centroid_1)

print("Titik Centroid Awal untuk Cluster 2:")
print(centroid_2)

# Menentukan baris data keberapa yang menjadi median
median_row_first_half = first_half.apply(lambda column: (column == centroid_1[column.name]).idxmax())
median_row_second_half = second_half.apply(lambda column: (column == centroid_2[column.name]).idxmax())

print("Baris data keberapa yang menjadi median di bagian pertama:")
print(median_row_first_half)

print("Baris data keberapa yang menjadi median di bagian kedua:")
print(median_row_second_half)

# %%
import numpy as np
centroid_min = np.min(data_num, axis=0)

# Metode nilai tengah untuk titik centroid awal
centroid_mid = np.mean(data_num, axis=0)

# Metode nilai maksimum untuk titik centroid awal
centroid_max = np.max(data_num, axis=0)

print("Titik centroid awal dengan metode nilai minimum:", centroid_min)
print("Titik centroid awal dengan metode nilai tengah:", centroid_mid)
print("Titik centroid awal dengan metode nilai maksimum:", centroid_max)

# %%
df.info()

# %%
data = df[['tahun','nama_siswa','Status_DTKS_Labels','kab_kota_sekolah','Penghasilan_Ayah_Labels','Penghasilan_Ibu_Labels','Jumlah_Tanggungan_Labels','Kepemilikan_Rumah_Labels']]

data.head(10)

# %%
# Mengurutkan data berdasarkan setiap kolom
sorted_df = data_num.apply(lambda column: column.sort_values().values)

# Memisahkan data menjadi 2 bagian
half_size = len(sorted_df) // 2
first_half = sorted_df.iloc[:half_size]
second_half = sorted_df.iloc[half_size:]

# Menghitung nilai tengah dari masing-masing bagian
median_first_half = first_half.median(axis=0)
median_second_half = second_half.median(axis=0)

print("Nilai Median Bagian Pertama:")
print(median_first_half)

print("Nilai Median Bagian Kedua:")
print(median_second_half)

# %%
# Menentukan baris data keberapa yang menjadi median
median_row_first_half = first_half.apply(lambda column: (column == median_first_half[column.name]).idxmax())
median_row_second_half = second_half.apply(lambda column: (column == median_second_half[column.name]).idxmax())

print("Baris data keberapa yang menjadi median di bagian pertama:")
print(median_row_first_half)

print("Baris data keberapa yang menjadi median di bagian kedua:")
print(median_row_second_half)

# %%
# Dua titik centroid mewakili dua kriteria
centroid_1 = np.array([0, 5, 6, 2, 1])
centroid_2 = np.array([1, 6, 6, 3, 6])

# Menghitung jarak Euclidean dari setiap data ke dua titik centroid
distances_to_centroid_1 = np.sqrt(np.sum((data_num - centroid_1) ** 2, axis=1))
distances_to_centroid_2 = np.sqrt(np.sum((data_num - centroid_2) ** 2, axis=1))

# Menambahkan nilai kuadrat dari Euclidean distances terdekat ke dalam tabel
squared_distances = np.where(distances_to_centroid_1 < distances_to_centroid_2,
                             distances_to_centroid_1 ** 2,
                             distances_to_centroid_2 ** 2)

# Menentukan ke dalam centroid mana setiap data termasuk
assigned_centroids = np.where(distances_to_centroid_1 < distances_to_centroid_2, 'Centroid 1', 'Centroid 2')

# Membuat DataFrame untuk menampilkan hasil
result_df = pd.DataFrame({'Data': range(1, len(data_num) + 1),
                          'Distance to Centroid 1': distances_to_centroid_1,
                          'Distance to Centroid 2': distances_to_centroid_2,
                           'Squared Distance': squared_distances,
                          'Assigned Centroid': assigned_centroids})

# Menampilkan DataFrame hasil
result_df.head(10)

# %%
centroid_counts = result_df['Assigned Centroid'].value_counts()

centroid_counts

# %%
# Menghitung jumlah seluruh nilai kuadrat
total_sum = np.sum(squared_distances)

print("Total jumlah nilai kuadrat:", total_sum)

# %%
# Menghitung rata-rata nilai setiap kolom pada Cluster 1
mean_cluster_1 = data_num[result_df['Assigned Centroid'] == 'Centroid 1'].mean(axis=0)

# Menghitung rata-rata nilai setiap kolom pada Cluster 2
mean_cluster_2 = data_num[result_df['Assigned Centroid'] == 'Centroid 2'].mean(axis=0)

print("Mean Cluster 1:")
print(mean_cluster_1)

print("Mean Cluster 2:")
print(mean_cluster_2)

# %%
# Menghitung jarak Euclidean dari setiap data ke rata-rata Cluster 1
distances_to_mean_cluster_1 = np.sqrt(np.sum((data_num - mean_cluster_1) ** 2, axis=1))

# Menghitung jarak Euclidean dari setiap data ke rata-rata Cluster 2
distances_to_mean_cluster_2 = np.sqrt(np.sum((data_num - mean_cluster_2) ** 2, axis=1))

# Membuat DataFrame untuk menampilkan hasil
result_df['Distance to Mean Cluster 1'] = distances_to_mean_cluster_1
result_df['Distance to Mean Cluster 2'] = distances_to_mean_cluster_2

# Menampilkan DataFrame hasil dengan jarak ke rata-rata Cluster 1 dan Cluster 2
result_df_2 = result_df[['Distance to Mean Cluster 1','Distance to Mean Cluster 2']]

result_df_2.head(10)

# %%
# Menentukan ke dalam centroid mana setiap data termasuk
assigned_centroids_2 = np.where(distances_to_mean_cluster_1 < distances_to_mean_cluster_2, 'C1', 'C2')

# Menambahkan nilai kuadrat dari Euclidean distances terdekat ke dalam tabel
squared_distances_2 = np.where(distances_to_mean_cluster_1 < distances_to_mean_cluster_2,
                             distances_to_mean_cluster_1 ** 2,
                             distances_to_mean_cluster_2 ** 2)

# Membuat DataFrame untuk menampilkan hasil
hasil_df = pd.DataFrame({'Data': range(1, len(data_num) + 1),
                          'Distance to Centroid 1': distances_to_mean_cluster_1,
                          'Distance to Centroid 2': distances_to_mean_cluster_2,
                          'Squared Distance': squared_distances_2,
                          'Assigned Cluster': assigned_centroids_2})

hasil_df

# %%
# Menghitung jumlah seluruh nilai kuadrat
total_sum_2 = np.sum(squared_distances_2)

print("Total jumlah nilai kuadrat:", total_sum_2)

# %%
# Menghitung rata-rata nilai setiap kolom pada Cluster 1
mean_cluster_1_2 = data_num[hasil_df['Assigned Cluster'] == 'C1'].mean(axis=0)

# Menghitung rata-rata nilai setiap kolom pada Cluster 2
mean_cluster_2_2 = data_num[hasil_df['Assigned Cluster'] == 'C2'].mean(axis=0)

print("Mean Cluster 1:")
print(mean_cluster_1_2)

print("Mean Cluster 2:")
print(mean_cluster_2_2)

# %%
# Menghitung jarak Euclidean dari setiap data ke rata-rata Cluster 1
distances_to_mean_cluster_1_2 = np.sqrt(np.sum((data_num - mean_cluster_1_2) ** 2, axis=1))

# Menghitung jarak Euclidean dari setiap data ke rata-rata Cluster 2
distances_to_mean_cluster_2_2 = np.sqrt(np.sum((data_num - mean_cluster_2_2) ** 2, axis=1))

# Menentukan ke dalam centroid mana setiap data termasuk
assigned_centroids_3 = np.where(distances_to_mean_cluster_1_2 < distances_to_mean_cluster_2_2, 'C1', 'C2')

# Menambahkan nilai kuadrat dari Euclidean distances terdekat ke dalam tabel
squared_distances_3 = np.where(distances_to_mean_cluster_1_2 < distances_to_mean_cluster_2_2,
                             distances_to_mean_cluster_1_2 ** 2,
                             distances_to_mean_cluster_2_2 ** 2)

# Membuat DataFrame untuk menampilkan hasil
hasil_df_2 = pd.DataFrame({'Data': range(1, len(data_num) + 1),
                          'Distance to Centroid 1': distances_to_mean_cluster_1_2,
                          'Distance to Centroid 2': distances_to_mean_cluster_2_2,
                          'Squared Distance': squared_distances_3,
                          'Assigned Cluster': assigned_centroids_3})

hasil_df_2

# %%
hasil_df_2.tail(3)

# %%
bcv = np.linalg.norm(mean_cluster_1_2 - mean_cluster_2_2)

bcv

# %%
hasil_df_2.tail(3)

# %%
# Menghitung jumlah seluruh nilai kuadrat
total_sum_3 = np.sum(squared_distances_3)

print("Total jumlah nilai kuadrat:", total_sum_3)

# %%
rasio = bcv / total_sum_3

rasio

# %%
# Menghitung rata-rata nilai setiap kolom pada Cluster 1
mean_cluster_1_3 = data_num[hasil_df_2['Assigned Cluster'] == 'C1'].mean(axis=0)

# Menghitung rata-rata nilai setiap kolom pada Cluster 2
mean_cluster_2_3 = data_num[hasil_df_2['Assigned Cluster'] == 'C2'].mean(axis=0)

print("Mean Cluster 1:")
print(mean_cluster_1_3)

print("Mean Cluster 2:")
print(mean_cluster_2_3)

# %%
# Menghitung jarak Euclidean dari setiap data ke rata-rata Cluster 1
distances_to_mean_cluster_1_3 = np.sqrt(np.sum((data_num - mean_cluster_1_3) ** 2, axis=1))

# Menghitung jarak Euclidean dari setiap data ke rata-rata Cluster 2
distances_to_mean_cluster_2_3 = np.sqrt(np.sum((data_num - mean_cluster_2_3) ** 2, axis=1))

# Membuat DataFrame untuk menampilkan hasil
result_df['Distance to Mean Cluster 1'] = distances_to_mean_cluster_1_3
result_df['Distance to Mean Cluster 2'] = distances_to_mean_cluster_2_3

# Menampilkan DataFrame hasil dengan jarak ke rata-rata Cluster 1 dan Cluster 2
result_df_3 = result_df[['Distance to Mean Cluster 1','Distance to Mean Cluster 2']]

result_df_3.head(10)

# %%
bcv_2 = np.linalg.norm(mean_cluster_1_3 - mean_cluster_2_3)

bcv_2

# %%
# Menambahkan nilai kuadrat dari Euclidean distances terdekat ke dalam tabel
squared_distances_2_3 = np.where(distances_to_mean_cluster_1_3 < distances_to_mean_cluster_2_3,
                             distances_to_mean_cluster_1_3 ** 2,
                             distances_to_mean_cluster_2_3 ** 2)

# Menentukan ke dalam centroid mana setiap data termasuk
assigned_centroids_4 = np.where(distances_to_mean_cluster_1_3 < distances_to_mean_cluster_2_3, 'C1', 'C2')

# Membuat DataFrame untuk menampilkan hasil
hasil_df_3 = pd.DataFrame({'Squared Distance': squared_distances_2_3,  'Assigned Cluster': assigned_centroids_4})

hasil_df_3.head(10)

# %%
# Menghitung jumlah seluruh nilai kuadrat
total_sum_4 = np.sum(squared_distances_2_3)

print("Total jumlah nilai kuadrat:", total_sum_4)

# %%
rasio_2 = bcv_2 / total_sum_4

rasio_2

# %%
from sklearn.cluster import KMeans
# Dua titik centroid mewakili dua kriteria
titik_centroid_1 = np.array([0, 5, 6, 2, 1])
titik_centroid_2 = np.array([1, 6, 6, 3, 6])

kmeans = KMeans(n_clusters=2, init=np.array([titik_centroid_1, titik_centroid_2]), n_init=1)

prev_inertia = None
current_inertia = None
max_iterations = 100
current_iteration = 0

while current_iteration < max_iterations:
    kmeans.fit(data_num)
    current_inertia = kmeans.inertia_

    if prev_inertia is not None and np.abs(prev_inertia - current_inertia) < 1e-6:
        break  # Konvergensi tercapai

    prev_inertia = current_inertia
    current_iteration += 1

print("Jumlah iterasi yang dibutuhkan:", current_iteration)

# %%
gabung = pd.concat([df, hasil_df_2], axis=1)

# Menghitung jumlah data dalam masing-masing cluster
jumlah_data_cluster = gabung.groupby(['kab_kota_sekolah', 'Assigned Cluster']).size().unstack(fill_value=0)

# Menambahkan kolom Total Data untuk masing-masing kota
jumlah_data_cluster['Total Data'] = jumlah_data_cluster.sum(axis=1)

# Menampilkan hasil tabel yang diurutkan dari data terbanyak
sorted_result = jumlah_data_cluster.sort_values(by='Total Data', ascending=False)

sorted_result.head(10)

# %%
sorted_result.tail(4)

# %%
# Menampilkan nilai-nilai yang ada dalam kolom 'Pekerjaan'
pekerjaan_values = df['pekerjaan_ibu'].unique()

pekerjaan_values

# %%
# Fungsi untuk mengubah atribut pekerjaan menjadi data numerik
def pekerjaan_num(pekerjaan):
    if pekerjaan == 'TNI / POLRI':
        return 1
    elif pekerjaan == 'PNS':
        return 2
    elif pekerjaan == 'Peg. Swasta':
        return 3
    elif pekerjaan == 'Wirausaha':
        return 4
    elif pekerjaan == 'Petani':
        return 5
    elif pekerjaan == 'Nelayan':
        return 6
    elif pekerjaan == 'Lainnya':
        return 7
    elif pekerjaan == 'TIDAK BEKERJA':
        return 8
    elif pekerjaan == '-':
        return 8
    
df['Pekerjaan_Ayah_Labels'] = df['pekerjaan_ayah'].apply(pekerjaan_num)

# %%
df['Pekerjaan_Ibu_Labels'] = df['pekerjaan_ibu'].apply(pekerjaan_num)

# %%
data_cluster = df[['Status_DTKS_Labels', 'Penghasilan_Ayah_Labels', 'Pekerjaan_Ayah_Labels', 'Penghasilan_Ibu_Labels', 'Pekerjaan_Ibu_Labels', 'Jumlah_Tanggungan_Labels', 'Kepemilikan_Rumah_Labels']]

data_cluster.head(10)

# %%
# Mengurutkan data berdasarkan setiap kolom
urutkan_df = data_cluster.apply(lambda column: column.sort_values().values)

# Memisahkan data menjadi 2 bagian
tengah = len(urutkan_df) // 2
first_tengah = urutkan_df.iloc[:tengah]
second_tengah = urutkan_df.iloc[tengah:]

# Menghitung nilai tengah dari masing-masing bagian
median_first_tengah = first_tengah.median(axis=0)
median_second_tengah = second_tengah.median(axis=0)

print("Nilai Median Bagian Pertama:")
print(median_first_tengah)

print("Nilai Median Bagian Kedua:")
print(median_second_tengah)

# %%
# Dua titik centroid mewakili dua kriteria
titik_1 = np.array([0, 5, 5, 5, 5, 3, 1])
titik_2 = np.array([1, 6, 5, 6, 5, 3, 6])

# Menghitung jarak Euclidean dari setiap data ke dua titik centroid
jarak_centroid_1 = np.sqrt(np.sum((data_cluster - titik_1) ** 2, axis=1))
jarak_centroid_2 = np.sqrt(np.sum((data_cluster - titik_2) ** 2, axis=1))

# Menambahkan nilai kuadrat dari Euclidean distances terdekat ke dalam tabel
kuadrat_distances = np.where(jarak_centroid_1 < jarak_centroid_2,
                             jarak_centroid_1 ** 2,
                             jarak_centroid_2 ** 2)

# Menentukan ke dalam centroid mana setiap data termasuk
hasil_cluster = np.where(jarak_centroid_1 < jarak_centroid_2, 'C1', 'C2')

# Membuat DataFrame untuk menampilkan hasil
hasil_data = pd.DataFrame({'Data': range(1, len(data_cluster) + 1),
                          'Distance to Centroid 1': jarak_centroid_1,
                          'Distance to Centroid 2': jarak_centroid_2,
                          'Squared Distance': kuadrat_distances,
                          'Assigned Centroid': hasil_cluster})

# Menampilkan DataFrame hasil
hasil_data.head(10)

# %%
data_mentah = df[['status_dtks', 'Penghasilan_Ayah_Transformed', 'pekerjaan_ayah', 'Penghasilan_Ibu_Transformed', 'pekerjaan_ibu', 'Jumlah_Tanggungan_Transformed', 'kepemilikan_rumah']]

data_mentah.head(10)

# %%
data_mentah.tail(10)

# %%
data_cluster.head(10)

# %%
hasil_data.tail(10)

# %%
hasil_bcv = np.linalg.norm(titik_1 - titik_2)

hasil_bcv

# %%
# Menghitung jumlah seluruh nilai kuadrat
total_wcv = np.sum(kuadrat_distances)

print("Total jumlah nilai kuadrat:", total_wcv)

# %%
nilai_rasio = hasil_bcv / total_wcv

nilai_rasio

# %%
# Menghitung rata-rata nilai setiap kolom pada Cluster 1
titikbaru_1 = data_cluster[hasil_data['Assigned Centroid'] == 'C1'].mean(axis=0)

# Menghitung rata-rata nilai setiap kolom pada Cluster 2
titikbaru_2 = data_cluster[hasil_data['Assigned Centroid'] == 'C2'].mean(axis=0)

print("Mean Cluster 1:")
print(titikbaru_1)

print("Mean Cluster 2:")
print(titikbaru_2)

# %%
# Menghitung jarak Euclidean dari setiap data ke dua titik centroid
jarak_centroid_1_2 = np.sqrt(np.sum((data_cluster - titikbaru_1) ** 2, axis=1))
jarak_centroid_2_2 = np.sqrt(np.sum((data_cluster - titikbaru_2) ** 2, axis=1))

# Menambahkan nilai kuadrat dari Euclidean distances terdekat ke dalam tabel
kuadrat_distances_2 = np.where(jarak_centroid_1_2 < jarak_centroid_2_2,
                             jarak_centroid_1_2 ** 2,
                             jarak_centroid_2_2 ** 2)

# Menentukan ke dalam centroid mana setiap data termasuk
hasil_cluster_2 = np.where(jarak_centroid_1_2 < jarak_centroid_2_2, 'C1', 'C2')

# Membuat DataFrame untuk menampilkan hasil
hasil_data2 = pd.DataFrame({'Data': range(1, len(data_cluster) + 1),
                          'Distance to Centroid 1': jarak_centroid_1_2,
                          'Distance to Centroid 2': jarak_centroid_2_2,
                          'Squared Distance': kuadrat_distances_2,
                          'Assigned Centroid': hasil_cluster_2})

# Menampilkan DataFrame hasil
hasil_data2.head(10)

# %%
hasil_data2.tail(5)

# %%
hasil_bcv2 = np.linalg.norm(titikbaru_1 - titikbaru_2)

hasil_bcv2

# %%
# Menghitung jumlah seluruh nilai kuadrat
total_wcv2 = np.sum(kuadrat_distances_2)

print("Total jumlah nilai kuadrat:", total_wcv2)

# %%
hasil_rasio2 = hasil_bcv2 / total_wcv2

hasil_rasio2

# %%
# Menghitung rata-rata nilai setiap kolom pada Cluster 1
titikbr_1 = data_cluster[hasil_data2['Assigned Centroid'] == 'C1'].mean(axis=0)

# Menghitung rata-rata nilai setiap kolom pada Cluster 2
titikbr_2 = data_cluster[hasil_data2['Assigned Centroid'] == 'C2'].mean(axis=0)

print("Mean Cluster 1:")
print(titikbr_1)

print("Mean Cluster 2:")
print(titikbr_2)

# %%
# Menghitung jarak Euclidean dari setiap data ke dua titik centroid
jarak_centroid_1_3 = np.sqrt(np.sum((data_cluster - titikbr_1) ** 2, axis=1))
jarak_centroid_2_3 = np.sqrt(np.sum((data_cluster - titikbr_2) ** 2, axis=1))

# Menambahkan nilai kuadrat dari Euclidean distances terdekat ke dalam tabel
kuadrat_distances_3 = np.where(jarak_centroid_1_3 < jarak_centroid_2_3,
                             jarak_centroid_1_3 ** 2,
                             jarak_centroid_2_3 ** 2)

# Menentukan ke dalam centroid mana setiap data termasuk
hasil_cluster_3 = np.where(jarak_centroid_1_3 < jarak_centroid_2_3, 'C1', 'C2')

# Membuat DataFrame untuk menampilkan hasil
hasil_data3 = pd.DataFrame({'Data': range(1, len(data_cluster) + 1),
                          'Distance to Centroid 1': jarak_centroid_1_3,
                          'Distance to Centroid 2': jarak_centroid_2_3,
                          'Squared Distance': kuadrat_distances_3,
                          'Assigned Centroid': hasil_cluster_3})

# Menampilkan DataFrame hasil
hasil_data3.head(10)

# %%
hasil_bcv3 = np.linalg.norm(titikbr_1 - titikbr_2)

hasil_bcv3

# %%
# Menghitung jumlah seluruh nilai kuadrat
total_wcv3 = np.sum(kuadrat_distances_3)

print("Total jumlah nilai kuadrat:", total_wcv3)

# %%
hasil_rasio3 = hasil_bcv3 / total_wcv3

hasil_rasio3

# %%
# Menghitung rata-rata nilai setiap kolom pada Cluster 1
titiknew_1 = data_cluster[hasil_data3['Assigned Centroid'] == 'C1'].mean(axis=0)

# Menghitung rata-rata nilai setiap kolom pada Cluster 2
titiknew_2 = data_cluster[hasil_data3['Assigned Centroid'] == 'C2'].mean(axis=0)

print("Mean Cluster 1:")
print(titiknew_1)

print("Mean Cluster 2:")
print(titiknew_2)

# %%
# Menghitung jarak Euclidean dari setiap data ke dua titik centroid
jarak_centroid_1_4 = np.sqrt(np.sum((data_cluster - titiknew_1) ** 2, axis=1))
jarak_centroid_2_4 = np.sqrt(np.sum((data_cluster - titiknew_2) ** 2, axis=1))

# Menambahkan nilai kuadrat dari Euclidean distances terdekat ke dalam tabel
kuadrat_distances_4 = np.where(jarak_centroid_1_4 < jarak_centroid_2_4,
                             jarak_centroid_1_4 ** 2,
                             jarak_centroid_2_4 ** 2)

# Menentukan ke dalam centroid mana setiap data termasuk
hasil_cluster_4 = np.where(jarak_centroid_1_4 < jarak_centroid_2_4, 'C1', 'C2')

# Membuat DataFrame untuk menampilkan hasil
hasil_data4 = pd.DataFrame({'Data': range(1, len(data_cluster) + 1),
                          'Distance to Centroid 1': jarak_centroid_1_4,
                          'Distance to Centroid 2': jarak_centroid_2_4,
                          'Squared Distance': kuadrat_distances_4,
                          'Assigned Centroid': hasil_cluster_4})

# Menampilkan DataFrame hasil
hasil_data4.head(10)

# %%
hasil_bcv4 = np.linalg.norm(titiknew_1 - titiknew_2)

hasil_bcv4

# %%
# Menghitung jumlah seluruh nilai kuadrat
total_wcv4 = np.sum(kuadrat_distances_4)

print("Total jumlah nilai kuadrat:", total_wcv4)

# %%
hasil_rasio4 = hasil_bcv4 / total_wcv4

hasil_rasio4

# %%
# Menghitung rata-rata nilai setiap kolom pada Cluster 1
titiknw_1 = data_cluster[hasil_data4['Assigned Centroid'] == 'C1'].mean(axis=0)

# Menghitung rata-rata nilai setiap kolom pada Cluster 2
titiknw_2 = data_cluster[hasil_data4['Assigned Centroid'] == 'C2'].mean(axis=0)

print("Mean Cluster 1:")
print(titiknw_1)

print("Mean Cluster 2:")
print(titiknw_2)

# %%
# Menghitung jarak Euclidean dari setiap data ke dua titik centroid
jarak_centroid_1_5 = np.sqrt(np.sum((data_cluster - titiknw_1) ** 2, axis=1))
jarak_centroid_2_5 = np.sqrt(np.sum((data_cluster - titiknw_2) ** 2, axis=1))

# Menambahkan nilai kuadrat dari Euclidean distances terdekat ke dalam tabel
kuadrat_distances_5 = np.where(jarak_centroid_1_5 < jarak_centroid_2_5,
                             jarak_centroid_1_5 ** 2,
                             jarak_centroid_2_5 ** 2)

# Menentukan ke dalam centroid mana setiap data termasuk
hasil_cluster_5 = np.where(jarak_centroid_1_5 < jarak_centroid_2_5, 'C1', 'C2')

# Membuat DataFrame untuk menampilkan hasil
hasil_data5 = pd.DataFrame({'Data': range(1, len(data_cluster) + 1),
                          'Distance to Centroid 1': jarak_centroid_1_5,
                          'Distance to Centroid 2': jarak_centroid_2_5,
                          'Squared Distance': kuadrat_distances_5,
                          'Assigned Centroid': hasil_cluster_5})

# Menampilkan DataFrame hasil
hasil_data5.head(10)

# %%
hasil_bcv5 = np.linalg.norm(titiknw_1 - titiknw_2)

hasil_bcv5

# %%
# Menghitung jumlah seluruh nilai kuadrat
total_wcv5 = np.sum(kuadrat_distances_5)

print("Total jumlah nilai kuadrat:", total_wcv5)

# %%
nilai_rasio5 = hasil_bcv5 / total_wcv5

nilai_rasio5

# %%
# Menghitung jumlah data dalam masing-masing centroid
hitungs = hasil_data2['Assigned Centroid'].value_counts()

hitungs



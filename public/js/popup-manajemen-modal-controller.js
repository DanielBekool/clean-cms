
      // Definisikan fungsi openModal dan closeModal di scope global
      window.openModal = function(element) {
          // Mendapatkan data dari elemen yang diklik
          const name = element.querySelector('.name').textContent;
          const position = element.querySelector('.position').textContent;
          const photo = element.querySelector('.photo').src;
          const description = element.querySelector('.description').innerHTML;
          
          // Mengisi data ke dalam modal
          document.querySelector('.modal-title').textContent = name;
          document.querySelector('.modal-position').textContent = position;
          document.querySelector('.modal-image img').src = photo;
          document.querySelector('.modal-description').innerHTML = description;
          
          // Menampilkan modal
          document.getElementById('modal').classList.remove('hidden');
          
          // Mencegah scroll pada body
          document.body.style.overflow = 'hidden';
      }
      
      window.closeModal = function() {
          // Menyembunyikan modal
          document.getElementById('modal').classList.add('hidden');
          
          // Mengaktifkan kembali scroll pada body
          document.body.style.overflow = 'auto';
      }


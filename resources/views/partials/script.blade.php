<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
      const collapseBtn = document.querySelectorAll(".btn-collapse");
      const collapseNav = document.querySelector(".collapse-nav ul");

      collapseBtn.forEach((e) => {
        e.addEventListener("click", () => {
          collapseNav.classList.toggle("active");
        });
      });

      document.querySelector(".notif-pop").addEventListener("click", () => {
        document.querySelector(".notif-card").classList.toggle("active-pop");
      });

      document.querySelector(".profile-pop").addEventListener("click", () => {
        document.querySelector(".profile-card").classList.toggle("active-pop");
      });

</script>
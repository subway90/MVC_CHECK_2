<div class="container d-flex justify-content-center p-3">
    <div class="col-12 col-md-6 col-lg-5 card-result rounded-3 py-5 px-3 px-lg-5 text-center">
        <div class="h3 text-main text-uppercase mb-3">
            Đánh giá dịch vụ
        </div>
        <form action="" method="post">
            <label for="range" class="form-label">Mức điểm đánh giá</label>
            <div id="feedbackMessage" class="text-main"></div>
            <div id="range" class="d-flex justify-content-center gap-2">
                <i id="star1" class="bi bi-star-fill fs-3 color-muted" data-value="1"></i>
                <i id="star2" class="bi bi-star-fill fs-3 color-muted" data-value="2"></i>
                <i id="star3" class="bi bi-star-fill fs-3 color-muted" data-value="3"></i>
                <i id="star4" class="bi bi-star-fill fs-3 color-muted" data-value="4"></i>
                <i id="star5" class="bi bi-star-fill fs-3 color-muted" data-value="5"></i>
                <input type="hidden" name="point" id="point" value="">
            </div>
            <div class="my-3">
                <label for="content" class="form-label">Nội dung</label>
                <textarea class="form-control" id="content" name="content" rows="3" placeholder="Viết nội dung đánh giá"></textarea>
            </div>
            <button disabled class="btn btn-dark shadow" id="sendBtn" name="sendBtn" type="submit">Gửi đi</button>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const stars = document.querySelectorAll('#range i');
        const pointInput = document.getElementById('point');
        const sendBtn = document.getElementById('sendBtn');
        const textarea = document.getElementById('content');
        const feedbackMessage = document.getElementById('feedbackMessage');

        const messages = {
            1: "Rất không hài lòng",
            2: "Không hài lòng",
            3: "Bình thường",
            4: "Hài lòng",
            5: "Rất hài lòng"
        };

        stars.forEach(star => {
            star.addEventListener('click', function () {
                const score = this.getAttribute('data-value');
                pointInput.value = score;

                // Cập nhật màu sắc của các ngôi sao
                stars.forEach((s, index) => {
                    if (index < score) {
                        s.classList.remove('color-muted');
                        s.classList.add('color-yellow'); // Thay đổi màu sắc sao đã chọn
                    } else {
                        s.classList.remove('color-yellow');
                        s.classList.add('color-muted');
                    }
                });

                // Cập nhật nội dung thông điệp
                feedbackMessage.textContent = messages[score];

                // Kiểm tra xem textarea có nội dung không để bật nút
                checkButtonState();
            });
        });

        textarea.addEventListener('input', function () {
            // Kiểm tra xem textarea có nội dung không để bật nút
            checkButtonState();
        });

        function checkButtonState() {
            if (pointInput.value !== '' && textarea.value.trim() !== '') {
                sendBtn.disabled = false; // Bật nút nếu có điểm và nội dung
            } else {
                sendBtn.disabled = true; // Tắt nút nếu không
            }
        }
    });
</script>
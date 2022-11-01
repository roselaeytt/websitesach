CREATE DATABASE website;
USE website;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE(`email`)
);

CREATE TABLE `books`(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `title` varchar(200) NOT NULL,
    `description` varchar(2000) NOT NULL,
    `photo` varchar(200) NOT NULL,
    `author` varchar(100) NOT NULL,
    `price` decimal(19,0) NOT NULL,
    `publisher` varchar(100) NOT NULL,  -- nhà xuất bản
    PRIMARY KEY (`id`)
);

-- Thêm dữ liệu cho bảng books

insert into `books`(`title`, `description`, `photo`, `author`, `price`, `publisher`) values
    ('Đắc nhân tâm',
    'Đắc nhân tâm (Được lòng người), tên tiếng Anh là How to Win Friends and Influence People là một quyển sách nhằm tự giúp bản thân (self-help) bán chạy nhất từ trước đến nay. Quyển sách này do Dale Carnegie viết và đã được xuất bản lần đầu vào năm 1936, nó đã được bán 15 triệu bản trên khắp thế giới.
    Nó cũng là quyển sách bán chạy nhất của New York Times trong 10 năm. Tác phẩm được đánh giá là cuốn sách đầu tiên và hay nhất trong thể loại này, có ảnh hưởng thay đổi cuộc đời đối với hàng triệu người trên thế giới.',
    'assets/photo/dacnhantam.jpg',
    'Dale Carnegie',
    179000,
    'First News'
    ),
    ('Đại Việt sử ký toàn thư',
    'Đại Việt sử ký toàn thư (chữ Hán: 大越史記全書), đôi khi gọi tắt là Toàn thư, là bộ quốc sử viết bằng Hán văn của Việt Nam, viết theo thể biên niên, ghi chép lịch sử Việt Nam từ thời đại truyền thuyết Kinh Dương Vương năm 2879 TCN đến năm 1675 đời vua Lê Gia Tông nhà Hậu Lê. Bộ sử này được khắc in toàn bộ và phát hành lần đầu tiên vào năm Đinh Sửu, niên hiệu Chính Hòa năm thứ 18, triều vua Lê Hy Tông, tức là năm 1697. Đây là bộ chính sử Việt Nam xưa nhất còn tồn tại nguyên vẹn đến ngày nay, do nhiều đời sử quan trong Sử quán triều Hậu Lê biên soạn.
    Bộ sử bắt đầu được Ngô Sĩ Liên, một vị sử quan làm việc trong Sử quán dưới thời vua Lê Thánh Tông, biên soạn dựa trên sự chỉnh lý và bổ sung hai bộ quốc sử Việt Nam trước đó cùng mang tên Đại Việt sử ký của Lê Văn Hưu và Phan Phu Tiên. Hoàn thành vào niên hiệu Hồng Đức thứ 10 (1479), bộ sử mới của Ngô Sĩ Liên gồm 15 quyển, ghi lại lịch sử Việt Nam từ một thời điểm huyền thoại là năm 2879 TCN đến năm 1427 (khi nhà Hậu Lê được thành lập) và mang tên Đại Việt sử ký toàn thư. Sau đó, dù đã hoàn thành, Đại Việt sử ký toàn thư lại không được khắc in để ban hành rộng rãi mà tiếp tục được nhiều đời sử quan trong Quốc sử quán sửa đổi, bổ sung và phát triển thêm',
    'assets/photo/suky.jpg',
    'Ngô Sĩ Liên',
    379000,
    'Thời Đại'
    ),
    ('Tam quốc diễn nghĩa',
    'Tam quốc diễn nghĩa (giản thể: 三国演义; phồn thể: 三國演義, Pinyin: sān guó yǎn yì), là một tiểu thuyết về lịch sử Trung Quốc được La Quán Trung viết vào thế kỷ 14, kể về thời kỳ hỗn loạn Tam Quốc (190–280) với 120 chương hồi, theo phương pháp bảy thực ba hư (bảy phần thực ba phần hư cấu). Tiểu thuyết này được xem là một trong Tứ đại danh tác của văn học Trung Quốc.',
    'assets/photo/tamquoc.jpg',
    'La Quán Trung',
    329000,
    'Văn Học'
    );

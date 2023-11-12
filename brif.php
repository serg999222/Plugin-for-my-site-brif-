<?php
/**
 * Plugin Name: brif
 * Plugin URI: https://brif.com/
 * Description: blabla.
 * Version: 1.0.0
 * Author: bla
 */
//$css_path =plugins_url('style.css', __FILE__);
//wp_enqueue_style('custom_form_style',$css_path);

/*function enqueue_custom_script() {
	$script_url = plugins_url('scripts.js', __FILE__);
	wp_enqueue_script('custom_scripts', $script_url);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_script');*/

function enqueue_custom_styles() {
	$script_url = plugins_url('scripts.js', __FILE__);
	wp_enqueue_script('custom_scripts', $script_url);
	$css_url = plugins_url('style.css', __FILE__);
	wp_enqueue_style('custom_form_style', $css_url);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');



 function my_custom_form() {
	ob_start();
	?>
	<form method="post" action="" class="brif_form">
		<div id=brif_form_wrapper>
		<div class="popaps">
			<h2 id="popaps_title">Інформація про клієнта</h2>
			<div class="progress-bar-container">
				<div class="progress-bar"></div>
			</div>
				<div class="input_name_container">
				<label class="brif_label_all" for="input_name">Ваше ім'я *</label>
				<span class="input_name_error">Це обов'язкове поле</span>
				</div>				
			 	<input type="text" id="input_all" class="input_name" name="input_name" placeholder="Введіть Ваше ім'я"/>

				 <div class="input_tel_container">
				 <label class="brif_label_all" for="input_tel">Номер телефону *</label>
				 <span class="input_tel_error">Це обов'язкове поле</span>
				 </div>
				<input type="tel" id="input_all" class="input_tel" name="input_tel" placeholder="+38" pattern="[0-9\+\-\*\(\) ]+" oninput="validateTelInputTel(this)"/>

				<div class="input_email_container">
				<label class="brif_label_all" for="input_email">email *</label>
				<span class="input_email_error">Це обов'язкове поле</span>
				</div>
				<input type="email" id="input_all" class="input_email" name="input_email" placeholder="Введіть email"/>
			<div class="buttons_container">
				<button id="custom_buttoms_brif" class="prev" >вперед</button>
				<button id="custom_buttoms_brif" class="next">вперед</button>
			</div>			
		</div>

		<div class="popaps">
		<h2 id="popaps_title">Інформація про компанію, діяльність</h2>
			<div class="progress-bar-container">
				<div class="progress-bar"></div>
			</div>
			<label class="brif_label_all" for="input_name_organisation">Повна назва організації</label>
			<input type="text" id="input_all" class="input_name_organisation" name="input_name_organisation" placeholder="Введіть назву організації"/>
			<label class="brif_label_all" for="input_description_products">Опис основних продуктів/послуг</label>
			<textarea class="all_textarea input_description_products" name="input_description_products" placeholder="Опишіть основні продукти або послуги вашої діяльності" id="input_all"></textarea>
			<div class="buttons_container">
				<button id="custom_buttoms_brif" class="prev" >назад</button>
				<button id="custom_buttoms_brif" class="next">вперед</button>
			</div>
		</div>

		<div class="popaps">
		<h2 id="popaps_title">Конкуренти</h2>
			<div class="progress-bar-container">
				<div class="progress-bar"></div>
			</div>
			<label class="brif_label_all" for="input_description_competitor">Прямі конкуренти</label>
			<textarea class="all_textarea input_description_competitor" name="input_description_competitor" placeholder="Необхідно вказати прямих конкурентів у Вашому бізнес сегменті. По можливості охарактеризуйте їх сильні та слабі сторони. Вкажіть адреси сайтів." id="input_all"></textarea>
			<div class="buttons_container">
				<button id="custom_buttoms_brif" class="prev" >назад</button>
				<button id="custom_buttoms_brif" class="next">вперед</button>
			</div>
		</div>

		<div class="popaps">
		<h2 id="popaps_title">Цільова аудиторія</h2>
			<div class="progress-bar-container">
				<div class="progress-bar"></div>
			</div>
			<label class="brif_label_all" for="input_description_target_audience">Прямі конкуренти</label>
			<textarea class="all_textarea input_description_target_audience" name="input_description_target_audience" placeholder="Якщо є якісь особливості пов'язані з цільовою аудиторією, опишіть їх!" id="input_all"></textarea>
			<div class="buttons_container">
				<button id="custom_buttoms_brif" class="prev" >назад</button>
				<button id="custom_buttoms_brif" class="next">вперед</button>
			</div>
		</div>

		<div class="popaps">
		<h2 id="popaps_title">Інформація про інтернет проєкт</h2>
			<div class="progress-bar-container">
				<div class="progress-bar"></div>
			</div>
			<label class="brif_label_all" for="input_information_about_project">Що привело Вас до рішення створити новий сайт (змінити існуючий)?</label>
			<textarea class="all_textarea input_information_about_project" name="input_information_about_project" placeholder="Напишіть що привело Вас до рішення створити новий сайт (змінити існуючий)" id="input_all"></textarea>
			<label class="brif_label_all" for="input_information_about_function">Функціонал сайту</label>
			<textarea class="all_textarea input_information_about_function" name="input_information_about_function" placeholder="Опишіть який на вашу думку необхідний функціонал для Вашого сайту" id="input_all"></textarea>
			<label class="brif_label_all" for="input_deadline">. Бажані сроки розробки сайту</label>
			<input type="date" id="input_all" class="input_deadline" name="input_deadline"/>
			<div class="buttons_container">
				<button id="custom_buttoms_brif" class="prev" >назад</button>
				<button id="custom_buttoms_brif" class="next">вперед</button>
			</div>
		</div>
		<div class="popaps">
		<h2 id="popaps_title">Дизайн</h2>
			<div class="progress-bar-container">
				<div class="progress-bar"></div>
			</div>
			<label class="brif_label_all" for="input_wishes_to_design">Вимоги до дизайну </label>
			<textarea class="all_textarea input_wishes_to_design" name="input_wishes_to_design" placeholder="Напишіть вимоги до дизайну, які обов’язкові для виконання. Побажання до дизайну сайту" id="input_all"></textarea>
			<label class="brif_label_all" for="input_design_ather_sites">Близькі до бажаного результату по стилю сайти других компаній </label>
			<textarea class="all_textarea input_design_ather_sites" name="input_design_ather_sites" placeholder="Напишіть адреси декількох сайтів, які Вам подобаються. Що саме Вам подобається в цих сайтах (стильний дизайн, зручна навігація та ін.)?" id="input_all"></textarea>

			<label class="brif_label_all" for="colorPicker">Виберіть кольори які вам подобаються</label>
			<div class="colorPicker_wrapper">
				<div>
				<input type="color" id="colorPicker" name="colorPicker1" value="#FBE8A6">
				</div>
				<div>
				<input type="color" id="colorPicker" name="colorPicker2" value="#FBE8A6">
				</div>
				<div>
				<input type="color" id="colorPicker" name="colorPicker3" value="#FBE8A6">
				</div>							
			</div>
			<div class="buttons_container">
				<button id="custom_buttoms_brif" class="prev" >назад</button>
				<button id="custom_buttoms_brif" class="next">вперед</button>
			</div>
		</div>


		<div class="brif_form_submit_container">
			<input id="brif_form_submit" type="submit" name="submit_btn" value="Відправити" />
		</div>
		
		</div>
		
	</form>
	<?php
	return ob_get_clean();
}




// Додаємо короткий код для виведення форми
add_shortcode('custom_form', 'my_custom_form');

// Функція для обробки даних форми
function handle_custom_form() {
	// Перевіряємо, чи натискана кнопка "Відправити"
	if (isset($_POST['submit_btn'])) {
		// Отримуємо значення з форми
		$input_name = sanitize_text_field($_POST['input_name']);
		$input_tel = sanitize_text_field($_POST['input_tel']);
		$input_email = sanitize_text_field($_POST['input_email']);
		$input_name_organisation = sanitize_text_field($_POST['input_name_organisation']);
		$input_description_products = sanitize_text_field($_POST['input_description_products']);
		$input_description_competitor = sanitize_text_field($_POST['input_description_competitor']);
		$input_description_target_audience = sanitize_text_field($_POST['input_description_target_audience']);
		$input_information_about_project = sanitize_text_field($_POST['input_information_about_project']);
		$input_information_about_function = sanitize_text_field($_POST['input_information_about_function']);
		$input_deadline = sanitize_text_field($_POST['input_deadline']);
		$input_wishes_to_design = sanitize_text_field($_POST['input_wishes_to_design']);
		$input_design_ather_sites = sanitize_text_field($_POST['input_design_ather_sites']);
		$colorPicker1 = sanitize_text_field($_POST['colorPicker1']);
		$colorPicker2 = sanitize_text_field($_POST['colorPicker2']);
		$colorPicker3 = sanitize_text_field($_POST['colorPicker3']);

		// Отримайте інші значення з форми на потребу.

		// Зберігаємо дані, наприклад, в змінну $form_data
		$form_data = "Ім'я: $input_name\nТелефон: $input_tel\nEmail: $input_email\nНазва організації: $input_name_organisation\n
		Опис основних продуктів/послуг: $input_description_products\nКонкуренти: $input_description_competitor\n
		Цільова аудиторія: $input_description_target_audience\nЩо привело до рішення: $input_information_about_project\n
		Бажаний функціонал: $input_information_about_function\nДедлайн: $input_deadline\nПобажання з дизайну: $input_wishes_to_design\n
		Дизайн інших сайтів: $input_design_ather_sites\nКолір1: $colorPicker1\nКолір2: $colorPicker2\nКолір3: $colorPicker3";
		// Додайте інші поля форми до $form_data за потреби.

		// Ваша адреса електронної пошти для відправки
		$to = 'mail@ganz-studio.com.ua';

		// Тема електронної пошти
		$subject = 'Бріф на розробку сайту';

		// Заголовки електронної пошти
		$headers[] = 'Content-Type: text/html; charset=UTF-8';
		$headers[] = 'From: Your Website <noreply@ganz-studio.com.ua>';

		// Відправка електронної пошти
		wp_mail($to, $subject, $form_data, $headers);
	}
}

// Додаємо хук для обробки даних форми
add_action('init', 'handle_custom_form');

?>

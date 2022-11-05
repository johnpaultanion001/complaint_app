import 'package:flutter/material.dart';
import 'package:webview_flutter_upload/webview_flutter.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({Key? key}) : super(key: key);

  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: SafeArea(
        child: Scaffold(
          body: WebView(
            initialUrl: "https://complaint.supsofttech.com/login",
            javascriptMode: JavascriptMode.unrestricted,
          ),
        ),
      ),
    );
  }
}